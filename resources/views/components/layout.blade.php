<html>
<head>
    <title>{{ $title ?? 'Mars Rover' }}</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container px-5 mx-auto">
    <div class="flex flex-wrap w-full py-12 flex-col items-center text-center">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
            Mars Rover Control Centre
        </h1>
    </div>
</div>

<hr/>

<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
        {{ $slot }}
    </div>
</section>

<script>
    // Home function to randomize
    function randomize() {
        let randomDirection = '';
        const characters = 'FLR';

        for (let i = 0; i < 10; i++) {
            randomDirection += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        console.log(randomDirection)

        document.getElementById("command-string").value = randomDirection;
    }
</script>

</body>
</html>
