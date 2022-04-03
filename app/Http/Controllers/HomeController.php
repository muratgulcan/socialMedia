<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Feedback;
use App\Models\Likes;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Image;
use Purifier;
use Sentinel;
use Reminder;
use Mail;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use URL;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;






class HomeController extends Controller

{
    protected $user;
    


    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->user= Auth::user();

            return $next($request);
        });
    }

    public function main(){
        return view('welcome');
    }

    public function anasayfa(){

        $posts = Post::orderBy('id', 'DESC')->take(5)->get();
        $dailyPost = Post::where('id','207')->get();

        $right_posts = Post::inRandomOrder()->take(3)->get();
        $randomUsers = User::inRandomOrder()->take(3)->get();
        $search_user = User::all();


            return view('design2.index', [
              'posts' => $posts,  'right_posts' => $right_posts, 'randomUsers' => $randomUsers, 'search_user' =>$search_user, 'dailyPost' =>$dailyPost,

            ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

    public function register(){
        return view('design2.registerpage');

        
    }

    public function login_page(){
        return view('design2.loginpage');
    }


    public function settings(){
        return view('design2.settings');
    }

    public function profileSettings(){
        return view('design2.profileSettings');
    }
    public function profileSettingsPost(request $request){

        $request->validate([
            
            'name' => ['nullable','string', 'max:64'],
            'twitter_name' => ['nullable','string', 'max:32'],
            'instagram_name' => ['nullable','string', 'max:32'],
            'spotify_name' => ['nullable','string', 'max:32'],
            'info' => ['nullable','string', 'max:255'],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            
            
        ]);
 
        $user = Auth::user();


        if($request->hasFile('photo')){
            $avatar = $request->file('photo');
            $filename = Auth::user()->id.'avatar'.time().'.'. 'jpeg';
            Image::make($avatar)->save( public_path('/images/avatars/' . $filename ) );
            $user->photo = $filename;
            $save = $user->save();

            if($save){
                return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'name'=>$filename]);
            }else{
                  return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
            }

          }
        $user->name = $request->name;
        $user->info = $request->info;
        $user->twitter_name = $request->twitter_name;
        $user->instagram_name = $request->instagram_name;
        $user->spotify_name = $request->spotify_name;

        


        if($user->save()){

            return back();

        }
        
        
    }


    public function getProfile($username){

        
        $user = User::with('follows')->where('username', $username)->firstOrFail();
        

        if(isset($user)){
        return view('design2.profile', ['user'=>$user]);        
        }else{
            return redirect()->route('home');
        }
    }



      public function profilePhotoPost(Request $request){

        $request->validate([
              'photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
          ]);
  
        $user = Auth::user();
          if($request->hasFile('photo')){
            $avatar = Image::make($request->file('photo'));
            $filename = Auth::user()->id.'avatar'.time().'.'. 'jpeg';
            Image::make($avatar)->fit(400,400)->save( public_path('/images/avatars/' . $filename ) );
            $user->photo = $filename;
            $save = $user->save();

            if($save){
                return back()->with('success','Profil fotoğrafı güncellendi.');
            }else{
                return back()->with('error','Başarısız');
            }

          }
      }


      public function icerik_olustur(){
        if(Auth::user()->share_content == 1){
          return view('design2.icerikOlustur');
        }

        else {
            return redirect()->route('home');
        }
        }

      public function icerik_olusturPost(request $request){

        if(Auth::user()->share_content == 1){
        $request->validate([
            
            'title' => ['nullable','string', 'max:128'],
            'short_content' => ['nullable','string', 'max:256'],
            'content' => ['nullable','string'],
            'first_photo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            
            
        ]);

        if($request->hasFile('first_photo')) {

            $image = $request->file('first_photo');
            $filename = Auth::user()->id.'first_photo'.time().'.'. 'jpeg';
            $image_resize = Image::make($image->getRealPath());    
            $image_resize->save(public_path('images/posts/postsFirst/' .$filename))->save();

            $image2 = $request->file('first_photo');
            $filename2 = Auth::user()->id.'index_photo'.time().'.'. 'jpeg';
            $upload = Image::make($image2)->save( public_path('/images/posts/postsFirst/' . $filename2 ) );

            
            
            
        } 

        
        $title = $request->title;
        $short = $request->short_content;
        $content = $request->content;


        $save = Post::create([
            'title' => $title,
            'short_content' => $short,
            'content' => Purifier::clean($content),
            'user_id' => Auth::user()->id,
            'first_photo' => $filename,
            'index_photo' => $filename2,

            
        ]);

     

        if($save){
            return back();
        }else{
            return back();
        }
    }else {
        return redirect()->route('home');

    }
    

    }

    public function contentImageUpload(request $request){
        $mainImage = $request->file('file');
        $filename = time().'.'.$mainImage->extension();
        Image::make($mainImage)->save(public_path('/images/contentImage/'. $filename));
        return response()->json(['location'=>asset('/images/contentImage/'.$filename)]);
    }

    public function indexImageUpload(request $request){
        $mainImage = $request->file('file');
        $filename = time().'.'.$mainImage->extension();
        Image::make($mainImage)->save(public_path('/images/posts/postsFirst/'. $filename));
        return response()->json(['location'=>asset('/images/posts/postsFirst/'.$filename)]);
    }

    public function icerikDelete($id){

        $deletedata= Post::findOrFail($id);
        $deletedata->delete();


        if($deletedata){
            return back()->with('success','İçerik paylaşıldı.');
        }else{
            return back()->with('error','Başarısız. Lütfen bizimle iletişime geçin.');
        }
        

    }

    public function getIcerik($username, $id, $link){
        $posts = Post::inRandomOrder()->take(6)->get();
        $icerik = Post::findorfail($id);
        $randomUsers = User::inRandomOrder()->take(3)->get();


        return view('design2.icerik', [
            'posts' => $posts, 'icerik' => $icerik, 'randomUsers' => $randomUsers,

          ]);


    }


    public function kesfet(){
        $posts = Post::paginate(10);
        $right_posts = Post::inRandomOrder()->take(3)->get();
        $randomUsers = User::inRandomOrder()->take(3)->get();
        return view('design2.kesfet', ['posts'=>$posts,  'right_posts' => $right_posts, 'randomUsers' => $randomUsers,]);
    
    }

    public function timeline(){
        $posts = Post::paginate(10);
        $right_posts = Post::inRandomOrder()->take(3)->get();
        $randomUsers = User::inRandomOrder()->take(3)->get();
        $user = User::all();
        return view('design2.timeline', ['posts'=>$posts,  'right_posts' => $right_posts, 'randomUsers' => $randomUsers,'user'=>$user]);
    
    }

    public function comments(request $request){
        
        $request->validate([
            'comment' => ['string', 'max:256'],
        ]);

        $comment = $request->comment;
        $post_id = $request->post_id;

        $save = Comment::create([
            'comment' => $comment,
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
            
        ]);

    

        if($save){
            return back();
        }else{
            return back();
        }
    }

    public function deleteComments($id){
        $deletedata= Comment::findOrFail($id);
        $deletedata->delete();


        if($deletedata){
            return back();
        }else{
            return back();
        }

    }

    public function searchUsers(Request $request){

            $right_posts = Post::inRandomOrder()->take(3)->get();
            $randomUsers = User::inRandomOrder()->take(3)->get();
            $q = \Request::get('q');
            $user = User::with('follows')->where('username','LIKE','%'.$q.'%')->orWhere('name','LIKE','%'.$q.'%')->take(7)->get();
            $searchPost = Post::with('user')->where('title','LIKE','%'.$q.'%')->orWhere('content','LIKE','%'.$q.'%')->orWhere('short_content','LIKE','%'.$q.'%')->take(7)->get();
            
            if($q != ""){
                if($user->count() > 0 || $searchPost->count() > 0 )
                    return view('design2.searchUsers',['right_posts'=>$right_posts,'randomUsers'=>$randomUsers,'searchPost'=>$searchPost,'user'=>$user])->withQuery ( $q );
                
                else
                    return view ('design2.searchUsers',['right_posts'=>$right_posts,'randomUsers'=>$randomUsers,'searchPost'=>$searchPost,'user'=>$user])->withQuery ( $q );
                
            }
            
            
        }

        public function followSearch($id){


            $follower_id = $id;
            $user_id = Auth::user()->id;
            
    
            $save = Follow::create([
                'user_id' => Auth::user()->id,
                'follower_id' => $follower_id,
            ]);
    
            if($save){
                return redirect()->route('home');
            }else{
                return redirect()->route('home');
            }
        }



    
    


    public function follow($id){


        $follower_id = $id;
        $user_id = Auth::user()->id;
        

        $save = Follow::create([
            'user_id' => Auth::user()->id,
            'follower_id' => $follower_id,
        ]);

        if($save){
            return back();
        }else{
            return back();
        }
    }


    public function unfollow($id){

        
        $unfollow= Follow::where('user_id',Auth::user()->id)->where('follower_id',$id)->first();
        
        if($unfollow->user_id == Auth::user()->id){
            $unfollow->delete();


            if($unfollow){
                return back()->with('success','takipten cıkarıldı');
            }else{
                return back()->with('error','Başarısız.');
            }
        }else{
            exit();
        }
        
    }


    public function customPassword(){
        return view('design2.parolaDegistir');
    }

    public function customPasswordPost(request $request){
        $request->validate([
            'current_password' => ['required',new MatchOldPassword],
            'new_password'=>['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $save = User::find(Auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);
        if($save){
            return back()->with('success','Parola başarıyla değiştirildi');
        }
   
    }


    public function resetPassword(Request $request){
       
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('design2.emailPassword',['token' => $token],  function($message) use ($request) {
                  $message->from($request->email);
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }


    public function reset_password(){
        return view('design2.reset_password');
    }


    public function followers($username){
        $user = User::with('follows')->where('username', $username)->firstOrFail();
        $followers= Follow::with('user')->where('follower_id',$user->id)->get();

        if(isset($user)){
        return view('design2.followers', ['user'=>$user,'followers'=>$followers]);        
        }else{
            return redirect()->route('home');
        }
    }

    public function followings($username){
        $user = User::with('follows')->where('username', $username)->firstOrFail();
        $followings= Follow::with('user')->where('user_id',$user->id)->get();

        if(isset($user)){
        return view('design2.following', ['user'=>$user,'followings'=>$followings]);        
        }else{
            return redirect()->route('home');
        }
    }

    public function feedback(){

        $feedbacks = Feedback::with('user')->orderBy('id', 'desc')->take(20)->get();

        if(Auth::user()->is_admin == 1){
            return view('design2.feedbackPanel',['feedbacks'=>$feedbacks]);
        }
        else{
            return redirect()->route('home');
        }
    }

    public function feedbackPost(request $request){

        $request->validate([
            'feedback_title'=> 'nullable',
            'feedback_content' => 'nullable',
            'icerik_id' => 'nullable',
            'user_id' => 'nullable'
        ]);



        $icerik_id = $request->icerik_id;
        $feedback_title = $request->feedback_title;
        $feedback_content = $request->feedback_content; 
        $user_id = $request->user_id;

        $saveFeedback = Feedback::create([
            'icerik_id' => $icerik_id,
            'feedback_title' => $feedback_title,
            'feedback_content' => $feedback_content,
            'user_id' => $user_id,

        ]);

        if($saveFeedback){
            return response()->json(['name'=>'feedback']);
        }else{
            return back();
        }
    }


    public function like($id){
        $post_id = $id;
        $user_id = Auth::user()->id;
        
        

        $save = Likes::create([
            'user_id' => Auth::user()->id,
            'post_id' => $post_id,
        ]);

        if($save){
            return back();
        }else{
            return back();
        }
    }

    public function unlike($id){
        $unlike= Likes::where('user_id',Auth::user()->id)->where('post_id',$id)->first();
        
        if($unlike->user_id == Auth::user()->id){
            $unlike->delete();


            if($unlike){
                return back();
            }else{
                return back();
            }
        }else{
            exit();
        }
    }

    public function test(){
        return view('design2.test');
    }


    public function upload2(Request $request)
    {
        $folderPath = public_path('/images/posts/postsFirst/');

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.jpeg';

        file_put_contents($file, $image_base64);
        

        return response()->json(['success'=>'success']);
    }

    public function design3(){
        return view('design2.news');
    }
    public function design33(){
        return view('design2.news2');
    }
   

}
