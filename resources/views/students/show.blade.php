@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-800 rounded-lg px-5 py-4 mb-6 flex items-center gap-3">
        <svg class="w-5 h-5 text-green-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
@endif

<div class="bg-white rounded-xl shadow p-8">
    <div class="flex flex-col md:flex-row gap-8 items-start">
        <div class="flex flex-col items-center gap-3">
            <img src="{{ asset('storage/' . $student->profile_picture) }}"
                 alt="Profile Picture"
                 class="w-40 h-40 rounded-full object-cover border-4 border-blue-200 shadow">
            <span class="text-xs text-gray-400">Profile Photo</span>
        </div>

        <div class="flex-1">
            <h2 class="text-2xl font-bold text-blue-700 mb-1">
                {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
            </h2>
            <p class="text-gray-500 text-sm mb-6">Student ID: <span class="font-semibold text-gray-700">{{ $student->student_id }}</span></p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-3 text-sm">
                <div>
                    <span class="text-gray-500">Email</span>
                    <p class="font-medium text-gray-800">{{ $student->email }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Mobile Number</span>
                    <p class="font-medium text-gray-800">{{ $student->mobile_number }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Date of Birth</span>
                    <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Gender</span>
                    <p class="font-medium text-gray-800">{{ $student->gender }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Program</span>
                    <p class="font-medium text-gray-800">{{ $student->program }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Year Level</span>
                    <p class="font-medium text-gray-800">Year {{ $student->year_level }}</p>
                </div>
                <div class="md:col-span-2">
                    <span class="text-gray-500">Address</span>
                    <p class="font-medium text-gray-800">{{ $student->address }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Registered On</span>
                    <p class="font-medium text-gray-800">{{ $student->created_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-100">
        <a href="{{ route('students.create') }}"
           class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-lg transition text-sm">
            Register Another Student
        </a>
    </div>
</div>
@endsection
