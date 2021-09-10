<?php

namespace App\Http\Livewire\Admin;

use App\Models\Part as ModelsPart;
use Livewire\Component;

class Part extends Component
{
    public $parts;
    public $part_id = 0;
    public $last_id = 0;
    public $name = '';
    public $format_validation = '';
    public $formats = ['','normal'=>'Normal','custom'=>'Custom'];
    public $showForm = false;

    protected $listeners = ['destroy'];
    protected $rules = [
        'name' => 'required',
        'format_validation' => 'required'
    ];

    public function mount()
    {
        $this->parts = ModelsPart::all();
    }

    public function create()
    {
        $this->reset('part_id','name','format_validation');
        $this->showForm = !$this->showForm;
    }

    public function store()
    {
        $validated = $this->validate();
        $this->parts[] = ModelsPart::create($validated);
        $this->dispatchBrowserEvent("show-toast", ['icon'=>'success','title'=>__('Part has been added')]);
        $this->reset('part_id','name','format_validation');
    }

    public function edit($index, $id)
    {
        $this->part_id = $id;
        $this->name = $this->parts[$index]->name;
        $this->format_validation = $this->parts[$index]->format_validation;
        if($this->part_id!=$this->last_id){
            $this->showForm = true;
            $this->last_id = $id;
        }else{
            $this->showForm = false;
            $this->reset('last_id');
        }
    }

    public function update(){
        $validated = $this->validate();
        ModelsPart::find($this->part_id)->update($validated);
        $this->dispatchBrowserEvent("show-toast", ['icon'=>'success','title'=>__('Part has been edited')]);$this->dispatchBrowserEvent("show-toast", ['icon'=>'success','title'=>'Part has been edited']);
        $this->reset('part_id','name','format_validation');
        $this->mount();
    }

    public function delete($index, $id)
    {
        $this->dispatchBrowserEvent('confirm-dialog',[
            'title' => __('Are you sure?'),
            'text' => __('The part and the child will be deleted'),
            'confirmButtonText' => __('Yes'),
            'callable' => 'destroy',
            'data' => compact('index','id')
        ]);
    }

    public function destroy($data)
    {
        ModelsPart::find($data['id'])->delete();
        unset($this->parts[$data['index']]);
        $this->dispatchBrowserEvent('show-toast', ['icon'=>'success','title'=>__('Part has been deleted')]);
    }

    public function render()
    {
        return view('livewire.admin.part');
    }
}
