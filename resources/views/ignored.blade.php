<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <title>Checkmate - Tighten</title>
    </head>

    <body>
        <div class="bg-white border-t-4 border-indigo relative z-10 shadow">
            <div class="p-2">
                <section class="max-w-xl mx-auto">
                    <div class="flex justify-between items-center">
                        <p class="flex items-center">
                            <a
                                href="{{ route('project.index') }}"
                                class="uppercase text-2xl leading-normal text-black-light font-semibold font-open-sans tracking-wide no-underline"
                            >
                                Checkmate
                            </a>
                        </p>

                        <p class="italic font-thin leading-normal text-grey-blue-darkest">Catchy phrase I guess?</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="bg-frost font-sans relative z-0">
            <div class="max-w-md mx-auto pt-8">
                <div class="rounded-lg shadow">
                    <ul class="bg-grey-blue-light flex list-reset p-4 rounded-t-lg border-grey border-b-2">
                        <li class="w-1/2 text-grey-darker font-semibold uppercase text-xs tracking-wide">Project / Package name</li>
                    </ul>

                    <section class="bg-white rounded-b-lg">
                        @foreach ($projects as $project)
                            <ul class="flex list-reset p-4 border-t border-smoke">
                                <li class="w-1/2">
                                    <a class="text-indigo no-underline text-md" href="{{ $project->github_url }}">
                                        {{ $project->name }}
                                    </a>
                                </li>

                                <li class="w-1/2 text-right">
                                    <form action="{{ route('project.unignore', $project) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <input type="submit" value="Un-Ignore" class="bg-indigo-muted hover:bg-indigo-light text-white px-3 py-1 rounded cursor-pointer">
                                    </form>
                                </li>
                            </ul>
                        @endforeach
                    </section>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>