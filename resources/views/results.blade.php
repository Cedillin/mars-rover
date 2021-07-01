<x-layout>
    <div class="lg:w-2/3 w-full">
        @if($errors->any())
            <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
                <div
                    class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-red-500">
                                <svg fill="currentColor"
                                     viewBox="0 0 20 20"
                                     class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-lg text-red-800">
                        Error
                    </div>

                    @foreach($errors->all() as $error)
                        <li>
                            <div class="alert-description text-sm text-red-600" role="alert">
                                {{$error}}
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>
        @endif

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 sm:w-1/3 w-full">
                        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{ $position->x }}</h2>
                        <p class="leading-relaxed">Current X Position</p>
                    </div>
                    <div class="p-4 sm:w-1/3 w-full">
                        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{ $position->y }}</h2>
                        <p class="leading-relaxed">Current Y Position</p>
                    </div>
                    <div class="p-4 sm:w-1/3 w-full">
                        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{ $position->direction }}</h2>
                        <p class="leading-relaxed">Facing Direction</p>
                    </div>
                </div>

                <div class="mt-6 w-full text-center">
                    <a href="{{ route('home') }}"
                       class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded-md text-lg"
                    >
                        Go back
                    </a>
                </div>
            </div>
        </section>
    </div>
</x-layout>
