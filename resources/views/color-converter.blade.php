<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Color converter</title>
    </head>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md max-w-lg w-full">
            <h1 class="text-2xl font-bold text-center mb-6 bg-gradient-to-r from-blue-600 via-green-500 to-indigo-400 text-transparent bg-clip-text">
                Hex to RGB & RGB to Hex Converter
            </h1>

            @if(session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
                {{ session('error') }}
            </div>
            @endif

            @if (session('result'))
            @php $result = session('result'); @endphp
            <div class="mb-6">
                <p class="text-lg font-medium">
                    Result: <span class="font-bold">{{ strtoupper($result['type']) }}</span>
                </p>
                <div class="flex items-center gap-4 mt-4">
                    <!-- Use the color from the result for background-color -->
                    <div class="w-16 h-16 rounded-full" style="background-color: {{ $result['color'] }};"></div>
                    <span id="color-result" class="text-lg font-mono">{{ $result['value'] }}</span>
                    <!-- Copy to Clipboard Button -->
                    <button id="copy-button" class="px-2 py-2 ml-2 text-white bg-gray-600 hover:bg-gray-700 rounded-lg"
                        onclick="copyToClipboard()">
                        Copy to Clipboard
                    </button>
                </div>
            </div>
            @endif



            <form method="POST" action="{{ route('hex-to-rgb') }}" class="mb-6">
                @csrf
                <div class="mb-4">
                    <label for="hex" class="block text-sm font-medium text-gray-700">HEX Color</label>
                    <input type="text" id="hex" name="hex" placeholder="#ffffff"
                        class="mt-1 p-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                </div>
                <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">
                    Convert to RGB
                </button>
            </form>

            <form method="POST" action="{{ route('rgb-to-hex') }}">
                @csrf
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="r" class="block text-sm font-medium text-red-700">Red</label>
                        <input type="number" id="r" name="r" min="0" max="255"
                            class="mt-1 p-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        @error('r')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="g" class="block text-sm font-medium text-green-700">Green</label>
                        <input type="number" id="g" name="g" min="0" max="255"
                            class="mt-1 p-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        @error('g')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="b" class="block text-sm font-medium text-blue-700">Blue</label>
                        <input type="number" id="b" name="b" min="0" max="255"
                            class="mt-1 p-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        @error('b')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                    Convert to HEX
                </button>
            </form>
        </div>



        <script>
            function copyToClipboard() {
                const resultText = document.getElementById('color-result').textContent;
                navigator.clipboard.writeText(resultText).then(() => {
                    // Alert user or give feedback on successful copy
                    alert('Copied to clipboard: ' + resultText);
                }).catch(err => {
                    console.error('Failed to copy text: ', err);
                });
            }
        </script>
    </body>

</html>
