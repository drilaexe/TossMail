<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Toss Mail') }}
        </h2>
    </x-slot>
    <script src="https://cdn.tiny.cloud/1/y6om04scypgcybzr0n1x0bnh2i5ht8frioxoh3vhollgh0d3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: "textarea",
            plugins: 'powerpaste casechange searchreplace autolink directionality advcode visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave',
            toolbar: 'undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat',
            height: '690px',
            skin: 'oxide-dark',
            content_css: 'dark'
        });
    </script>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-white  dark:bg-gray-800  shadow-sm sm:rounded-lg pb-2 ">
                <div class="grid grid-cols-3 gap-4 pb-2">
                    <div>
                        <label class="">
                            <span class=" text-m  font-medium text-white">Emertimi</span>
                            <x-input-label for="ListName" value="{{ __('Emri Listes') }}" class="sr-only" />

                            <x-text-input id="ListName" name="Emertimi" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Emri Listes') }}" />
                        </label>
                    </div>
                    <div>
                        <label class="">
                            <span class=" text-m  font-medium text-white">Subjekti</span>
                            <x-input-label for="ListName" value="{{ __('Emri Listes') }}" class="sr-only" />

                            <x-text-input id="ListName" name="Emertimi" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Emri Listes') }}" />
                        </label>
                    </div>
                    <div>
                        <label class="">
                            <span class=" text-m  font-medium text-white">Lista Emailave</span>
                            <x-input-label for="ListName" value="{{ __('Emri Listes') }}" class="sr-only" />

                            <x-text-input id="ListName" name="Emertimi" type="text" class="mt-1 block w-full"
                                placeholder="{{ __('Emri Listes') }}" />
                        </label>
                    </div>
                </div>
                <h4 class=" text-center text-m  font-medium text-white">Pershkrimi</h4>
                <form method="post" action="dump.php">
                    <textarea name="content"></textarea>
                </form>

            </div>
        </div>
    </div>
    <x-blue-button class="text-xl  bottom-0 right-0 fixed z-50 me-3 mb-3" id="" onclick=""><i class="fa-solid fa-paper-plane"></i>
       &nbsp; {{ __('Dergo') }}
    </x-blue-button>

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
