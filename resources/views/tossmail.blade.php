<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista Emaileve') }}
        </h2>
    </x-slot>
    {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {

        });
    </script>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ps-2 bg-white  dark:bg-gray-800  shadow-sm sm:rounded-lg pb-2 ">
                <div x-data="editor('<p>Hello world! :-)</p>')">

                    <template x-if="isLoaded()">
                        <div class="menu">
                            <button @click="toggleHeading({ level: 1 })"
                                :class="{ 'is-active': isActive('heading', { level: 1 }, updatedAt) }">
                                H1
                            </button>
                            <button @click="toggleBold()" :class="{ 'is-active': isActive('bold', updatedAt) }">
                                Bold
                            </button>
                            <button @click="toggleItalic()" :class="{ 'is-active': isActive('italic', updatedAt) }">
                                Italic
                            </button>
                        </div>
                    </template>

                    <div x-ref="element"></div>
                </div>

            </div>
        </div>
    </div>


    <x-modal maxWidth="6xl" name="see-modal-lista" class="auto-cols-max" focusable>


        <h1 class="ms-4 text-white text-lg" id="HeaderseeEmailList">Emailat e shtuar</h1>
        <div class="grid grid-cols-4 gap-3 overflow-y-auto scroll-m-[34rem] scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-400 ps-2 pe-2"
            id="EmailsShow" style="max-height: 36rem">

        </div>



        <div class="mt-6 ms-2 me-2 mb-2 flex justify-between">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Anulo') }}
            </x-secondary-button>
            {{-- <div>
                <x-danger-button id="FshiListen" onclick="changebtn()" data-id="0"><i class="fa fa-trash"></i>
                    {{ __('Fshij Listen') }}
                </x-danger-button>
                <x-blue-button class="hidden" id="FshiListenAn" onclick="changebtn()"><i class="fa fa-xmark"></i>
                    {{ __('Anulo') }}
                </x-blue-button>
                <x-danger-button class="hidden" id="FshiListenPrano" onclick="fshijlisten()" data-id="0"><i
                        class="fa fa-trash"></i>
                    {{ __('Fshij') }}
                </x-danger-button>
            </div> --}}
        </div>

    </x-modal>
    <script>
        function seemodal(IdListes, EmriListes) {
            console.log(IdListes);

            $('#HeaderseeEmailList').html(EmriListes);
            $('#FshiListenPrano').data('id', IdListes);
            $('#EmailsShow').empty();
            axios(`/ListDetails/${IdListes}`).then(function(response) {
                console.log(response.data);
                $.each(response.data, function(indexInArray, valueOfElement) {

                    $('#EmailsShow').append(
                        `<div class="grid grid-rows-2 grid-flow-col border ps-1 pe-1 pb-1 border-gray-500">
                            <div  class="row-start-1 row-end-2">
                                <span class="block text-sm font-medium text-white">Emri</span>
                                <x-text-input disabled   class="mt-1  block w-full"
                                value="${valueOfElement.Emri}" />
                            </div>
                            <div  class="row-start-2 row-end-2">
                                <span class="block text-sm font-medium text-white">Email</span>
                                <x-text-input disabled  class="mt-1  block w-full"
                                value="${valueOfElement.Email}" />
                            </div>
                   </div>`
                    );
                });
            });
        }
    </script>

</x-app-layout>
