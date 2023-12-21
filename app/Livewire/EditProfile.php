<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditProfile extends Component
{   

    
    use WithFileUploads;
    public $name;
    public $username;
    public $description;
    public $image;


    protected function rules()
    {
        return [
            'name' => 'required|min:6',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore(Auth::id()),
                'min:3',
                'max:20',
                'not_in:twitter,edita-perfil',
                'not_in:edit-profile,post, posts, /, create, logout, home, sign-up, /posts/create'
            ],  
            'image' => 'nullable|image|max:10000',
        ];
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->username = $user->username;
        $this->description = $user->description;
        
    }

    public function store()
    {
        $this->validate($this->rules());
        $user = User::find(auth()->user()->id);
        $userFolder = 'public/uploads/' . Auth::id() . "/profile";
        if($this->image)
        {
            if (!Storage::exists($userFolder)) {
                Storage::makeDirectory($userFolder);
            }
    
            // Eliminar la imagen anterior, si existe
            if ($user->image) {
                Storage::delete($userFolder . '/' . $user->image);
            }
    
            $fileName = 'profileAvatar.' . $this->image->getClientOriginalExtension();
            Storage::putFileAs($userFolder, $this->image, $fileName);
    
            $user->image = $fileName;
            $user->save();
            $this->image->delete();
        }

        $user->username = $this->username;
        $user->name = $this->name;
        $user->description = $this->description;
        $user->save();
        
        return redirect()->route('user.index', $user->username);
    }
}

