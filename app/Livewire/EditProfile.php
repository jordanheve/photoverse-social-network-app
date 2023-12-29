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
            'name' => 'required|min:6|max:24',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore(Auth::id()),
                'min:3',
                'max:20',
                'not_in:twitter,edita-perfil',
                'not_in:edit-profile,post, posts, /, create, logout, home, sign-up, /posts/create'
            ],  
            'image' => 'nullable|image|max:10000',
            'description' => 'max:140'
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
        if($this->image)
        {
            // Eliminar la imagen anterior, si existe
            if ($user->image) {
                Storage::delete('public/' . $user->image);
            }
    
            $uniqueFileName = Str::uuid()->toString() . '.' . $this->image->getClientOriginalExtension();;
            Storage::putFileAs('public', $this->image, $uniqueFileName);
    
            $user->image = $uniqueFileName;
            $user->save();
            $this->image->delete();
        }

        $user->username = $this->username;
        $user->name = $this->name;
        $user->description = $this->description;
        $user->save();
        $this->dispatch('userUpdated', ["userProfile" => route('user.index', $user->username)] );
    }
}

