<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container mx-auto">
        <h1 class="py-10 text-3xl font-bold text-center text-red-500">Student Information</h1>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($data as $student)
                <div class="relative w-full p-4 border rounded-md shadow-md bg-slate-200">
                    <div class="w-32 h-32 mx-auto overflow-hidden rounded-full">
                        <img class="object-cover w-full h-full" src="images/{{$student->image}}" alt="image">
                    </div>
                    <h2 class="absolute text-2xl font-bold right-2 top-2">{{$student->stID}}</h2>
                    <h2 class="mt-4 text-2xl font-bold">Name:{{$student->name}}</h2>
                    <h4 class="text-lg font-medium">Email: {{$student->email}}</h4>
                    <h4 class="text-lg font-medium">Department: {{$student->department}}</h4>
                    <h4 class="text-lg font-medium">Phone: {{$student->phone}}</h4>
                    <h4 class="text-lg font-medium">Address: {{$student->address}}</h4>
                    <div class="flex justify-end gap-3 mt-3">
                        <a href="{{ route('edit_data', $student->id) }}" class="bg-orange-500 text-[#FFF] px-3 py-1 rounded-md">Edit</a>
                        <button class="bg-red-600 text-[#FFF] px-3 py-1 rounded-md">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
