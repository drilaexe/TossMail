<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2ZXJzaW9uPSIxLjIiIGJhc2VQcm9maWxlPSJ0aW55IiB2aWV3Qm94PSIwLjAwIDAuMDAgMTIwMC4wMCAxMjAwLjAwIj4KPHBhdGggZmlsbD0iI2MxYzFjMSIgZD0iCiAgTSA1NjUuMDQgNzI1LjQ3CiAgUSA1NjQuMzEgNzI0LjM5IDU2Mi44MiA3MjUuMDcKICBRIDU2MS4zMCA3MjUuNzcgNTU2LjE5IDcyOS42OAogIEMgNTAwLjAyIDc3Mi42NyA0NTMuMTAgODIwLjI3IDQwOS4wNyA4NzUuODEKICBRIDM3Ni4zNyA5MTcuMDYgMzQzLjE1IDk1Ny45MQogIEMgMzE3LjczIDk4OS4xNyAyOTEuOTkgMTAxOC45MiAyNjAuMDAgMTA0My43NwogIEMgMjQwLjU0IDEwNTguODggMjAyLjUwIDEwODMuNTAgMTc2LjQ2IDEwNzMuMzgKICBDIDE1OS42NyAxMDY2Ljg1IDE1MS4wMCAxMDQ5LjQxIDE1MC4zMiAxMDMyLjE3CiAgQyAxNDguNzkgOTkyLjkwIDE2MC4xOSA5NjAuNDAgMTc4LjQwIDkyNi4zNgogIEMgMjIzLjAxIDg0Mi45NCAyNzIuMzkgNzYyLjg5IDMyMi40NyA2ODIuNzEKICBDIDM0Ni43MCA2NDMuOTEgMzcyLjk3IDYwOC43NCA0MDAuOTUgNTczLjcyCiAgQyA0NTIuODEgNTA4LjgyIDUwOC41NCA0NDguNTYgNTY3LjEyIDM4OS43NAogIEMgNjY0Ljg5IDI5MS41NSA3NzguMDAgMjExLjk4IDkwMS4yMiAxNTAuNDkKICBDIDkyOS44OCAxMzYuMTggOTYzLjMzIDEyMi4zOCA5OTUuOTkgMTI2LjI3CiAgQyAxMDM1LjQ4IDEzMC45NyAxMDU5LjI1IDE2NS42MyAxMDQ2LjQ5IDIwNC4zNgogIFEgMTAzMy44MyAyNDIuNzkgMTAwMC40NCAyNjUuNDUKICBRIDk5My4zNSAyNzAuMjYgOTc1LjIwIDI4MC4zOAogIEMgOTMzLjg1IDMwMy40NCA4ODkuMTAgMzI0LjkwIDg0MC4zMCAzNDguMzAKICBRIDc1OS4wMyAzODcuMjggNjg4LjkzIDQ0My45MwogIEMgNjc0Ljg2IDQ1NS4zMCA2NjAuODQgNDY2Ljc3IDY0Ny43MiA0NzkuMzUKICBRIDYxNy42MCA1MDguMjIgNTg4LjIyIDUzNy45MwogIEEgMC45NCAwLjkzIC0zNC4yIDAgMCA1ODguMDIgNTM4Ljk2CiAgTCA1ODguMzYgNTM5Ljc0CiAgQSAwLjY4IDAuNjcgNjAuOCAwIDAgNTg5LjM3IDU0MC4wMwogIEMgNjE5LjMzIDUxOS4wNCA2NTAuMTEgNTAyLjAxIDY4NC40MiA0ODkuMTMKICBRIDY4Ni44MiA0ODguMjMgNjg4LjgzIDQ4Ny44NgogIEEgMi4wNSAyLjA0IC01LjIgMCAxIDY5MS4yNCA0ODkuODYKICBDIDY5MS4yNSA0OTMuMjQgNjkxLjM2IDQ5Ni42NSA2OTEuMDIgNTAwLjA2CiAgUSA2ODYuMzggNTQ3LjA0IDY4NS41NiA1NjIuMDYKICBDIDY4Mi45OSA2MDguOTAgNjc5Ljc5IDY1NC40OCA2NzUuMTkgNzAyLjMzCiAgQyA2NjUuMjMgODA2LjE1IDY0NS44MCA5MDYuNzUgNTg2LjI1IDk5My4yMgogIEMgNTc2LjQ3IDEwMDcuNDIgNTYyLjE2IDEwMjIuNzIgNTQ2LjIxIDEwMzIuNDcKICBDIDUzMy4yOCAxMDQwLjM3IDUxNC42MCAxMDQzLjc1IDUwMi4zMyAxMDMzLjY5CiAgQyA0ODIuMDUgMTAxNy4wNyA0NzcuMDMgOTcxLjM3IDQ3Ny43OCA5NDcuMDAKICBDIDQ3OC44NSA5MTIuMjkgNDg0LjgzIDg3Mi43MCA0ODYuNTggODQwLjI2CiAgUSA0ODcuMTAgODMwLjY3IDQ5MC43MiA4MjQuNDAKICBRIDUwMC4zNiA4MDcuNjggNTEyLjA1IDc5Mi4zMAogIFEgNTM3LjUxIDc1OC44MCA1NjQuOTUgNzI2Ljk3CiAgQSAxLjI0IDEuMjMgLTQxLjggMCAwIDU2NS4wNCA3MjUuNDcKICBaIgovPgo8cGF0aCBmaWxsPSIjYzFjMWMxIiBkPSIKICBNIDQ5OC42OSAzMzYuODEKICBDIDQ3My45MCAzMTMuODQgNDY1LjMyIDI4MC44NyA0NzguNzIgMjQ5LjE5CiAgQyA0OTMuNzQgMjEzLjcxIDUzMS4yNyAxOTAuNDAgNTY5LjgxIDIwNC4yOQogIEMgNjEyLjcxIDIxOS43NCA2MzQuMDUgMjY0LjY5IDYxNy44NiAzMDcuNTYKICBDIDYwNy42MSAzMzQuNjggNTgyLjc5IDM1Mi43NyA1NTQuNDYgMzU1Ljk3CiAgQyA1MzMuNTQgMzU4LjMzIDUxNC4xNiAzNTEuMTUgNDk4LjY5IDMzNi44MQogIFoiCi8+CjxwYXRoIGZpbGw9IiNjMWMxYzEiIGQ9IgogIE0gMzA0LjMwIDYwNy41NQogIEMgMzMzLjMzIDU3OS40MyAzNjguODYgNTU4LjQwIDQwMy43MyA1MzguNDcKICBRIDQxMC40MCA1MzQuNjYgNDE3LjQxIDUzMS44NwogIEEgMC4yOSAwLjI5IDAuMCAwIDEgNDE3Ljc0IDUzMi4zMgogIEMgMzgzLjk5IDU3My4yOCAzNTMuMjMgNjE1LjgwIDMyNC4wMCA2NjAuMDIKICBRIDMxNy45NCA2NjkuMTggMzEzLjk3IDY3Mi42MQogIEMgMzAyLjQyIDY4Mi41NSAyODYuODEgNjg1LjU5IDI3OS43NiA2NjguMjMKICBDIDI3MC44OCA2NDYuMzggMjg5Ljc1IDYyMS42NSAzMDQuMzAgNjA3LjU1CiAgWiIKLz4KPC9zdmc+Cg=="/>
        <title>{{ config('app.name', 'TossMail') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
