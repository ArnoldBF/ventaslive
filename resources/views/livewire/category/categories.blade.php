<div class="row sales layout-top-spacing">

    <div class="col-sm-12">
    
    <div class="widget widget-chart-one">
        <div class="widget-heading">
            <h4 class="card-title">
                <b>{{$componentName}}| {{$pageTitle}}</b>
            </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <a href="javascripy:void(0)" class="tabmenu bf-dark" data-toggle="modal" data-target="#theModal">Agregar</a>

                    </li>


                </ul>

        </div>

        @include('common.searchbox')
        <div class="widget-content">
            <div class="table-responsive">
                <table class="table table-bordered table striped table-hover mt-1">
                    <thead class="text-white" style="background: #022e5a">
                    <tr>
                        <th class="table-th text-white">DESCRIPCION</th>
                        <th class="table-th text-white">IMAGEN</th>
                        <th class="table-th text-white">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            
                        
                        <tr>
                            <td><h6>{{$category->name}}</h6></td>
                            <td class="text-center">
                                <span>
                                    <img src="{{asset('storage/categories/' .$category->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                </span>
                            </td>
                                <td class="text-center">
                                    <a href="javascript:voi(0)" wire:click="Edit({{$category->id}})" class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($category->products->count()<1)
                                    <a href="javascript:voi(0)" 
                                    onclick="Confirm('{{$category->id}}')"
                                    
                                    class="btn btn-dark " title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endif 
                                </td>

                            
                        </tr>
                        @endforeach
                    </tbody>
    
                </table>
                {{$categories->links()}}
    
            </div>
        </div>
    </div>
    
    </div>
    
    @include('livewire.category.form')
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function(){

            window.livewire.on('category-added', msg =>{
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('category-updated', msg =>{
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('category-deleted', msg =>{
                noty(msg)
            })
            window.livewire.on('hide-modal', msg =>{
                $('#theModal').modal('hide');
            })
            window.livewire.on('show-modal', msg =>{
                $('#theModal').modal('show');
            })
            window.livewire.on('hidden.bs.model', msg =>{
                $('.er').css('display', none);
            })
    
        });
      function Confirm(id){
        swal({
            title:'CONFIRMAR',
            text:'¿CONFIRMAS ELIMINAR EL REGISTRO',
            type:'warning',
            showCancelButton:true,
            cancelButtonText:'Cerrar',
            cancelButtonColor:'#fff',
            confirmButtonText:'Aceptar',
            confirmButtonColor:'#3B3F5C'


        }).then(function(result){
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
      }
     
    </script>
