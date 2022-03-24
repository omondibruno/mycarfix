<?php
namespace App\Http\Controllers;
use App\StudInsert;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudInsertController extends Controller
{
    
    public function insert(){
        $urlData = getURLList();
        return view('stud_create');
    }
    public function create(Request $request){
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'price' => 'required|int|min:3|max:255',
            'car_make' => 'required|string|email|max:255',
            'car_model' => 'required|string|min:4|max:10'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('insert')
            ->withInput()
            ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $inventory = new StudInsert;
                $inventory->first_name = $data['name'];
                $inventory->last_name = $data['price'];
                $inventory->city_name = $data['car_make'];
                $inventory->email = $data['car_model'];
                $inventory->save();
                return redirect('insert')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('insert')->with('failed',"operation failed");
            }
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Inventory | Add</title>
</head>
<body>
@if (session('status'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ session('failed') }}
</div>
@endif
<form action = "/create" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <table>
    <tr>
        <td>Name of part</td>
        <td><input type='text' name='name' /></td>
    <tr>
    <tr>
        <td>Price</td>
    <td><input type="number" name='price'/></td>
    </tr>
        <td>car make</td>
        <td><input type="text" name='car_make'/></td>
    </tr>
        <td>car model</td>
        <td><input type="text" name='car_model'/></td>
    </tr>

    <tr>
    <td colspan = '2'>
    <input type = 'submit' value = "Add data"/>
    </td>
    </tr>
    </table>
</form>
</body>
</html>