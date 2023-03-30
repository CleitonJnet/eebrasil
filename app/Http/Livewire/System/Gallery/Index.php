<?php

namespace App\Http\Livewire\System\Gallery;

use App\Models\Media;
use App\Models\Training;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Index extends Component
{
    use WithFileUploads;

    public $multimedia;
    public $event;
    public $image;
    public $getName;
    public $photo;
    public $photo_original;
    public $photo_viewer;
    public $photo_name;
    public $photo_id;
    public $data;

    public function mount(Training $event){
        $this->event = $event;
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|mimes:png,jpg|max:20480', // 20MB Max
        ]);
    }

    public function save(){
        if ($this->photo->getClientOriginalExtension() == 'png' || $this->photo->getClientOriginalExtension() == 'jpg' || $this->photo->getClientOriginalExtension() == 'jpeg'){
            $pathNameOriginal = $this->photo->hashName('events/'.$this->event->id.'/original');
            $pathNameThumbnail = $this->photo->hashName('events/'.$this->event->id.'/thumbnail');
            $pathNameOptimized = $this->photo->hashName('events/'.$this->event->id.'/optimized');

            $original = Image::make($this->photo);
            $thumbnail = Image::make($this->photo)->fit(400,300);
            $optimized = Image::make($this->photo)->fit(1200,900);

            Media::create([
                'training_id' => $this->event->id,
                'name' => $this->getName,
                'extension' => $this->photo->getClientOriginalExtension(),
                'path_original' => $pathNameOriginal,
                'path_thumbnail' => $pathNameThumbnail,
                'path_optimized' => $pathNameOptimized,
            ]);

            $this->getName = $this->multimedia = null;

            Storage::disk('public')->put($pathNameOriginal, $original->encode());
            Storage::disk('public')->put($pathNameThumbnail, $thumbnail->encode());
            Storage::disk('public')->put($pathNameOptimized, $optimized->encode());

            $this->photo = null;

            session()->flash('message', 'Foto salva com sucesso.');
        }
    }

    public $viewPhoto = false;
    public function showViewPhoto($id)
    {
        $this->viewPhoto = true;
        $this->data = Media::find($id);
        $this->photo_original = $this->data->path_original;
        $this->photo_viewer = $this->data->path_optimized;
        $this->photo_name = $this->data->name;
        $this->photo_id = $this->data->id;
    }
    public function hiddenViewPhoto() { $this->viewPhoto = false; }

    public function selectPhoto($id)
    {
        $this->data = Media::find($id);
        $this->photo_viewer = $this->data->path_optimized;
        $this->photo_original = $this->data->path_original;
        $this->photo_name = $this->data->name;
        $this->photo_id = $this->data->id;
        $this->viewPhoto = true;
    }

    public function delete()
    {
        $path_original  = 'storage/'.$this->data->path_original;
        $path_thumbnail = 'storage/'.$this->data->path_thumbnail;
        $path_optimized = 'storage/'.$this->data->path_optimized;
        if(file_exists($path_original))  { unlink($path_original); }
        if(file_exists($path_thumbnail)) { unlink($path_thumbnail); }
        if(file_exists($path_optimized)) { unlink($path_optimized); }
        $this->data->delete();
        $this->viewPhoto = false;
    }

    public function render()
    {
        $this->multimedia = Media::where('training_id',$this->event->id)->orderBy('name')->get();

        return view('livewire.system.gallery.index');
    }
}
