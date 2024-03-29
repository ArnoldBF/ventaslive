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
                        <th class="table-th text-white">TIPO</th>
                        <th class="table-th text-white">VALOR</th>
                        <th class="table-th text-white">IMAGEN</th>
                        <th class="table-th text-white text-center">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $coin)


                        <tr>
                            <td><h6>{{$coin->type}}</h6></td>
                            <td ><h6>{{number_format($coin->value,2)}}</h6></td>
                            <td>
                                <span>
                                    <img src="{{asset('storage/denominations/' .$coin->imagen)}}" alt="imagen de ejemplo" height="70" width="80" class="rounded">
                                </span>
                            </td>
                                <td class="text-center">
                                    <a href="javascript:voi(0)" wire:click="Edit({{$coin->id}})" class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="javascript:voi(0)"
                                    onclick="Confirm('{{$coin->id}}')"

                                    class="btn btn-dark " title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>


                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$data->links()}}

            </div>
        </div>
    </div>

    </div>

    @include('livewire.denominations.form')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function(){

            window.livewire.on('item-added', msg =>{
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('item-updated', msg =>{
                $('#theModal').modal('hide');
                noty(msg)
            })
            window.livewire.on('item-deleted', msg =>{
                noty(msg)
            })
            window.livewire.on('hide-modal', msg =>{
                $('#theModal').modal('hide');
            })
            window.livewire.on('show-modal', msg =>{
                $('#theModal').modal('show');
            })

            $('#theModal').on('hidden.bs.model', function(e){
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

