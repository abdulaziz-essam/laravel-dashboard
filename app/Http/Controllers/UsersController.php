
    <?php



    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class AuthController extends Controller
    {
        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                // Authentication successful
                $user = Auth::user();
                return response()->json([
                    'message' => 'User is authenticated',
                    'user' => $user
                ], 200);
            } else {
                // Authentication failed
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        }
    }
