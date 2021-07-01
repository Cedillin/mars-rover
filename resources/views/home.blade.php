<x-layout>
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

    <div class="lg:w-2/3 w-full">

        <form action="{{ route('rover.results') }}"
              method="POST"
              class="leading-relaxed">
            @csrf

            <div class="space-y-4">
                <div>
                    <label for="x-coordinate" class="block text-sm font-medium text-gray-700">Starting X
                        Coordinate</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm">
                                X
                              </span>
                        </div>
                        <input
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                            type="number"
                            name="x"
                            id="x-coordinate"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            max="200"
                            value="{{ old('x') }}"
                            required
                            placeholder="Max. 200">
                    </div>
                </div>

                <div>
                    <label for="y-coordinate" class="block text-sm font-medium text-gray-700">
                        Starting Y Coordinate
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                              <span class="text-gray-500 sm:text-sm">
                                Y
                              </span>
                        </div>
                        <input
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md"
                            type="number"
                            name="y"
                            id="y-coordinate"
                            onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57"
                            max="200"
                            value="{{ old('y') }}"
                            required
                            placeholder="Max. 200">
                    </div>
                </div>

                <div>
                    <label for="face_direction" class="block text-sm font-medium text-gray-700">
                        Starting Face Direction
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <select name="facing_direction"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md"
                                required>
                            <option value="" disabled selected>-- Select One --</option>
                            <option value="N">North</option>
                            <option value="E">East</option>
                            <option value="W">West</option>
                            <option value="S">South</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="command-string" class="block text-sm font-medium text-gray-700">Command String
                        (F = forward, L = left, R = right)</label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <div class="relative flex items-stretch flex-grow focus-within:z-10">
                            <input type="text"
                                   id="command-string"
                                   class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md sm:text-sm border-gray-300"
                                   name="command_string"
                                   maxlength="6"
                                   value="{{ old('command_string') }}"
                                   required
                                   placeholder="Ex. FRRLFR">
                        </div>
                        <span
                            class="-ml-px cursor-pointer relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
                            onclick="randomize()">
                                    <span>Randomize</span>
                                </span>
                    </div>
                </div>

                <button
                    class="text-white bg-indigo-500 border-0 w-full py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded-md text-lg"
                    type="submit">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
</x-layout>
