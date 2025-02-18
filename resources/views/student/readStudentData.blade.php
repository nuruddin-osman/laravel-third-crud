<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto">
        <h1 class="py-10 text-3xl font-bold text-center text-red-500">Student Information</h1>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($data as $student)
                <div class="relative w-full p-4 border rounded-md shadow-md bg-slate-200">
                    <h2 class="absolute text-2xl font-bold right-2 top-2">{{$student->stID}}</h2>
                    <h2 class="mt-4 text-2xl font-bold">Name:{{$student->name}}</h2>
                    <h4 class="text-lg font-medium">Email: {{$student->email}}</h4>
                    <h4 class="text-lg font-medium">Department: {{$student->department}}</h4>
                    <h4 class="text-lg font-medium">Phone: {{$student->phone}}</h4>
                    <h4 class="text-lg font-medium">Address: {{$student->address}}</h4>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>