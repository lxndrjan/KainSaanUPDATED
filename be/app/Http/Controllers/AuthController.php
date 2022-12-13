<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{User, FoodEstablishment, Food, FoodEstablishmentImage, FoodImage, Review, MyFavorite,Visited};

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (! $token = auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Your account is not authorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $newData = User::create([
            'email'    => $request->email,
            'password' => $request->password,
            'full_name' => $request->full_name,
            'role_id'  => 2,
        ]);

        return response()->json(['success' => 'Your registration has been submitted and waiting for approval.', $newData], 200);
    }
    
    public function getAllFoodEstablishmentsOnMap(){
        $allRecord = FoodEstablishment::with(['images', 'reviews', 'favorites'])->orderBy('created_at', 'DESC')->get();
        return response()->json($allRecord);
    }

    public function getAllFoodEstablishments(Request $request){
        $allRecord = FoodEstablishment::with(['images', 'reviews', 'favorites'])
        ->orderBy('created_at', 'DESC')
        ->where('store_name', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('address', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('category', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('cuisine_type', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('parking_info', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('average_cost', 'LIKE','%'.$request->keyword.'%')
        ->paginate(10);
        return response()->json($allRecord);
    }

    public function getRecommendedFoodEstablishments(Request $request){
        $allRecord = FoodEstablishment::with(['images', 'reviews', 'favorites'])->orderBy('created_at', 'DESC')
        ->where('store_name', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('address', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('category', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('cuisine_type', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('parking_info', 'LIKE','%'.$request->keyword.'%')
        ->orWhere('average_cost', 'LIKE','%'.$request->keyword.'%')
        ->paginate(10);
        return response()->json($allRecord);
    }

    public function getTrendingFoodEstablishments(){
        $allRecord = FoodEstablishment::where('rating', '>', '2.9')->with(['images', 'reviews', 'favorites'])->orderBy('created_at', 'DESC')->paginate(5);
        return response()->json($allRecord);
    }

    public function getAllFavorites(){
        $allRecord = MyFavorite::where('user_id', auth()->user()->id)->with(['foodEstablishment', 'foodEstablishment.images', 'foodEstablishment.reviews', 'foodEstablishment.foods'])->orderBy('created_at', 'DESC')->get();
        return response()->json($allRecord);
    }

    public function getMyFavorite($id){
        $favorite = MyFavorite::where('food_establishment_id', $id)->where('user_id', auth()->user()->id)->first();
        return response()->json($favorite);
    }

    public function getVisited(){
        $visited = Visited::where('user_id', auth()->user()->id)->with(['foodEstablishment', 'foodEstablishment.images', 'foodEstablishment.reviews', 'foodEstablishment.foods'])->get();
        return response()->json($visited);
    }

    public function getFoodEstablishment($id){
        $record = FoodEstablishment::where('id', $id)->with(['images', 'reviews', 'favorites', 'foods'])->first();
        return response()->json($record);
    }

    public function addReview(Request $request, $id){
        $foodEstId = FoodEstablishment::where('id', $id)->first();
        $reviewer = User::where('id', auth()->user()->id)->first();

        $data = Review::create([
            'review'                => $request->review,
            'rating'                => $request->rating,
            'food_establishment_id' => $foodEstId->id,
            'user_name'             => $reviewer->full_name
        ]);

        $sumRatings = Review::where('food_establishment_id',  $id)->sum('rating');
        $totalCount = Review::where('food_establishment_id',  $id)->count();
        $totalRatings = ($sumRatings / $totalCount);

        $foodEstId->update([
            'rating' => $totalRatings
        ]);
        
        return response()->json(['msg' => 'Review submitted', $sumRatings, $totalCount], 200);
    }

    public function registerFoodEstablishment(Request $request)
    {
        $foodEstablishment = FoodEstablishment::create([
            'user_id'           => auth()->user()->id,
            'store_name'        => $request->store_name,
            'address'           => $request->address,
            'coords'            => $request->coords,
            'category'          => $request->category,
            'cuisine_type'      => $request->cuisine_type,
            'parking_info'      => $request->parking_info,
            'average_cost'      => $request->average_cost,
            'store_description' => $request->store_description, 
        ]);

        return response()->json($foodEstablishment, 200);
    }

    public function updateFoodEstablishment(Request $request, $id)
    {
        $foodEstablishment = FoodEstablishment::where('id', $id)->first();
        $foodEstablishment->update([
            'store_name'        => $request->store_name,
            'address'           => $request->address,
            'coords'            => $request->coords,
            'category'          => $request->category,
            'cuisine_type'      => $request->cuisine_type,
            'parking_info'      => $request->parking_info,
            'average_cost'      => $request->average_cost,
            'store_description' => $request->store_description, 
        ]);

        return response()->json($foodEstablishment, 200);
    }

    public function updateFoodInfo(Request $request, $id)
    {
        $foodInfo = Food::where('id', $id)->first();
        $foodInfo->update([
            'food_name'             => $request->food_name,
            'price'                 => $request->price,
            'category'              => $request->category,
        ]);

        return response()->json($foodInfo, 200);
    }

    public function updateFoodImage(Request $request, $id)
    {
        if($request->files){
            foreach ($request->files as $file) 
            {
                $ext              = $file->getClientOriginalExtension();
                $originalFileName = $file->getClientOriginalName();
                $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
                $fileName         = 'new-'.$fileNameOnly . '.' . $ext;
                $file->move( storage_path('app/public/food') , $fileName );
                
                $image = Food::where('id', $id)->first();
                $image->update([
                    'image' => env('APP_URL').'/storage/food/'.$fileName,
                ]);
            }
            return response()->json(['msg'=>'File successfully uploaded.']);
        }
        return null;
    }

    public function addFood(Request $request)
    {
        $id = FoodEstablishment::where('user_id', auth()->user()->id)->first();
        foreach($request->foods as $food){
            $ext              = $food['food_image']->getClientOriginalExtension();
            $originalFileName = $food['food_image']->getClientOriginalName();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = $fileNameOnly . '.' . $ext;
            $food['food_image']->move( storage_path('app/public/food') , $fileName );
            $newFood = Food::create([
                'food_establishment_id' => $id->id,
                'food_name'             => $food['food_name'],
                'price'                 => $food['food_price'],
                'category'              => $food['food_category'],
                'image'                 => env('APP_URL').'/storage/food/'.$fileName
            ]);
        }
        return response()->json(['msg' => 'Food added successfully!'], 200);
    }

    public function addNewFood(Request $request)
    {
        $id = FoodEstablishment::where('user_id', auth()->user()->id)->first();
        foreach($request->foods as $food){
            $ext              = $food['food_image']->getClientOriginalExtension();
            $originalFileName = $food['food_image']->getClientOriginalName();
            $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
            $fileName         = $fileNameOnly . '.' . $ext;
            $food['food_image']->move( storage_path('app/public/food') , $fileName );
            $newFood = Food::create([
                'food_establishment_id' => $id->id,
                'food_name'             => $food['food_name'],
                'price'                 => $food['food_price'],
                'category'              => $food['food_category'],
                'image'                 => env('APP_URL').'/storage/food/'.$fileName
            ]);
        }
        return response()->json(['msg' => 'Food added successfully!'], 200);
    }

    public function uploadFoodEstablishmentImages(Request $request, $id)
    {
        if($request->files){
            foreach ($request->files as $file) 
            {
                $ext              = $file->getClientOriginalExtension();
                $originalFileName = $file->getClientOriginalName();
                $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
                $fileName         = $fileNameOnly . '.' . $ext;
                $file->move( storage_path('app/public/food-establishment') , $fileName );
                
                $img                        = new FoodEstablishmentImage();
                $img->file_name             = $fileName;
                $img->file_path             = env('APP_URL').'/storage/food-establishment/'.$fileName;
                $img->food_establishment_id = $id;
                $img->save();
            }
            return response()->json(['msg'=>'File successfully uploaded.']);
        }
        return null;
    }

    public function updateFoodEstablishmentImages(Request $request, $id)
    {
        if($request->files){
            foreach ($request->files as $file) 
            {
                $ext              = $file->getClientOriginalExtension();
                $originalFileName = $file->getClientOriginalName();
                $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
                $fileName         = 'new-'.$fileNameOnly . '.' . $ext;
                $file->move( storage_path('app/public/food-establishment') , $fileName );
                
                $image = FoodEstablishmentImage::where('food_establishment_id', $id)->first();
                $image->update([
                    'file_name' => $fileName,
                    'file_path' => env('APP_URL').'/storage/food-establishment/'.$fileName,
                ]);
            }
            return response()->json(['msg'=>'File successfully uploaded.']);
        }
        return null;
    }
    
    public function addViews($id)
    {
        $foodEstablishment = FoodEstablishment::findOrFail($id);
        if(Visited::where('food_establishment_id', $id)->count() <= 0){
            Visited::create([
                'user_id' => auth()->user()->id,
                'food_establishment_id' => $foodEstablishment->id
            ]);
        }
        if($foodEstablishment->user_id != auth()->user()->id){
            $foodEstablishment->views++;
            $foodEstablishment->save();
            return response()->json(['msg'=>'Views added']);
        }

        return null;
    }

    public function deleteFood($id)
    {
        $food = Food::where('id', $id)->first();
        $food->delete();
        return response()->json(['msg'=>'Food deleted']);
    }

    public function addToFavorites($id)
    {
        $fav = MyFavorite::create([
            'user_id' => auth()->user()->id,
            'food_establishment_id' => $id
        ]);
        return response()->json(['msg'=>'Favorite added']);
    }
    
    public function removeToFavorites($id)
    {
        $fav = MyFavorite::where('id', $id)->where('user_id', auth()->user()->id)->first();
        $fav->delete();
        return response()->json(['msg'=>'Favorite added']);
    }

    public function uploadFoodImages(Request $request)
    {
        if($request->files){
            foreach ($request->files as $file) 
            {
                $ext              = $file->getClientOriginalExtension();
                $originalFileName = $file->getClientOriginalName();
                $fileNameOnly     = pathinfo($originalFileName, PATHINFO_FILENAME);
                $fileName         = $fileNameOnly . '.' . $ext;
                $file->move( storage_path('app/public/food') , $fileName );
                
                $img            = new FoodImage();
                $img->file_name = $fileName;
                $img->file_path = env('APP_URL').'/storage/food/'.$fileName;
                $img->food_id   = 1;
                $img->save();
            }
            return response()->json(['msg'=>'File successfully uploaded.']);
        }
        return null;
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $foodEstablishment = User::where('id', auth()->user()->id)->with(['foodEstablishment', 'foodEstablishment.images', 'foodEstablishment.reviews',  'foodEstablishment.foods'])->first();
        return response()->json($foodEstablishment);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['success' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $me = User::where('id', auth()->user()->id)->first();
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'role'         => $me->role->role
        ]);
    }
}
