<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Content -->
            <main>
               <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8  ">
                <div class="mt-5 md:mt-0 md:col-span-2 flex justify-center">
                    {!! Form::open(['route' => 'web.tickets.store', 'autocomplete' => 'off', 'files' => true]) !!}
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md  w-24	 ">
                            <div class="grid grid-cols-4 gap-6   ">
                                <!-- Prioridad -->
                                <div class="col-span-6 sm:col-span-4 justify-center ">
                                    <label class="block font-medium text-sm text-gray-700 " for="name">Prioridad
                                    </label>                        

                                    {{ Form::select('priority_id', $priority, null , ['class' => 'select2', 'style' => 'width: 100%;']) }}
                                </div>
                                <!-- Grupo de soporte -->
                                <div class="col-span-6 sm:col-span-4 ">
                                    <label class="block font-medium text-sm text-gray-700 " for="name">Grupo de soporte
                                    </label>                                                              
                                    <select class="form-control" style="width: 100%" name="group_id" >
                                        <option value="" selected >Ninguno en especifico</option>
                                          @foreach ($groups as $group)
                                              <option value="{{$group->id}}" >{{$group->group}}</option>
                                          @endforeach
                                      </select>

                                   {{--  {{ Form::select('group_id', $groups, [null => 'general'], ['class' => 'select2', 'style' => 'width: 100%;']) }} --}}
                                </div>
                                <!-- Titulo -->
                                <div class="col-span-6 sm:col-span-4 ">
                                    <label class="block font-medium text-sm text-gray-700 " for="email">Titulo
                                    </label>
                                    <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="tittle" id="tittle" type="text" >
                                </div>
                                <!-- Cuerpo -->
                                <div class="col-span-6 sm:col-span-4 ">
                                    <label class="block font-medium text-sm text-gray-700 " for="email">Descripción
                                    </label>
                                    <textarea  name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            {!! Form::submit('Crear Ticket', ['class' => 'cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) !!}                            
                        </div>
                       
                    {!! Form::close() !!}
                </div>
               </div>
            </main>
        </div>
   

        <script>
          ClassicEditor

.create(document.querySelector('#description'), {
    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
})
.catch( error => {
    console.error( error );
} );

ClassicEditor
    </script>


    </body>
</html>
