<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Email') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ps-2 bg-white  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-blue-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-modal-lista')">{{ __('Add List') }}</x-danger-button>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ps-2 bg-white  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{ __('"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"') }}
            </div>
        </div>
    </div>
    <x-modal maxWidth="6xl" name="add-modal-lista" class="auto-cols-max" focusable>
        <form method="post" id="AddEmailList" action="{{ route('AddEmailList') }}" class="p-6">
            @csrf
            @method('post')
            <div class="grid grid-cols-4 gap-3">
                <div class="col-span-1">
                    <label class="block">
                        <span class="block text-m  font-medium text-white">List Name</span>
                        <x-input-label for="ListName" value="{{ __('ListName') }}" class="sr-only" />

                        <x-text-input id="ListName" name="Emertimi" type="text" class="mt-1 block w-full"
                            placeholder="{{ __('ListName') }}" />
                    </label>
                    <h1 class="mt-2 mb-2 text-white">Add Emails</h1>
                    <span class="block text-sm font-medium text-white">Name</span>
                    <x-input-label for="ListName" value="{{ __('ListName') }}" class="sr-only" />

                    <x-text-input id="Name" name="Name" type="text" class="mt-1 block w-full"
                        placeholder="{{ __('Name') }}" />

                    </label>
                    <label class="block" for="EmailAdd" value="{{ __('EmailAdd') }}">
                        <span class="block text-sm font-medium text-white">Email</span>

                        <x-input-label for="EmailAdd" value="{{ __('EmailAdd') }}" class="sr-only" />

                        <x-text-input id="EmailAdd" name="EmailAdd" type="email" class="mt-1 block w-full peer ..."
                            placeholder="{{ __('EmailAdd') }}" />

                        <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                            Please provide a valid email address.
                        </p>
                    </label>
                    <div class="flex flex-row-reverse">
                        <x-blue-button id="AddEmailAndName" type="button">
                            {{ __('Add') }}
                        </x-blue-button>
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        AddedEmail=0;
                        $('#AddEmailAndName').click(function(e) {
                            e.preventDefault();
                            $('#ListOfEmailsAdded').append(`
                            <div class="grid grid-rows-2 grid-flow-col">
                            <div class="row-start-1 row-end-2">
                                <x-text-input  id="nameaddedemail${AddedEmail}" name="EmailList[${AddedEmail}][Emri]" class="mt-1  block w-full"
                                value="${$('#Name').val()}" />
                            </div>
                            <div class="row-start-2 row-end-2">
                                <x-text-input  id="emailadded${AddedEmail}" name="EmailList[${AddedEmail}][Email]" class="mt-1  block w-full"
                                value="${$('#EmailAdd').val()}" />
                            </div>
                            <div class="row-span-3 ms-2 self-center">
                            <button type="button" onclick="$(this).parent().parent().remove()"
                                class="w-auto inline-flex items-center px-4 py-3 bg-red-600 border border-transparent rounded-md font-semibold  text-sm text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('X') }}
                            </button>
                            </div>
                            </div>`);
                            AddedEmail++;
                        });
                    });
         
                </script>
                <div class="col-span-3">
                    <h1 class="ms-4 text-white text-lg">Added Emails</h1>
                    <div class="grid grid-cols-3 gap-3 overflow-y-auto scroll-m-[34rem] scrollbar scrollbar-thumb-gray-900 scrollbar-track-gray-400"
                        id="ListOfEmailsAdded" style="max-height: 36rem">
                    
                    </div>
                   

                </div>
            </div>
        </form>
        <div class="mt-6 ms-2 me-2 mb-2 flex justify-between">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-blue-button class="ml-3" type="submit" form="AddEmailList">
                {{ __('Save') }}
                </x-danger-button>
        </div>
    </x-modal>
</x-app-layout>
