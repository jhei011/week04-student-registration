@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="bg-white rounded-xl shadow p-8">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Student Registration Form</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 rounded p-4 mb-6">
            <p class="font-semibold mb-1">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Personal Information --}}
        <fieldset class="border border-gray-200 rounded-lg p-4">
            <legend class="text-sm font-semibold text-gray-600 px-2">Personal Information</legend>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name <span class="text-red-500">*</span></label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('first_name') border-red-400 @enderror">
                    @error('first_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name <span class="text-red-500">*</span></label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('last_name') border-red-400 @enderror">
                    @error('last_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('date_of_birth') border-red-400 @enderror">
                    @error('date_of_birth')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gender <span class="text-red-500">*</span></label>
                    <select name="gender"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('gender') border-red-400 @enderror">
                        <option value="">-- Select --</option>
                        @foreach (['Male', 'Female', 'Other'] as $g)
                            <option value="{{ $g }}" {{ old('gender') == $g ? 'selected' : '' }}>{{ $g }}</option>
                        @endforeach
                    </select>
                    @error('gender')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                    <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('mobile_number') border-red-400 @enderror">
                    @error('mobile_number')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </fieldset>

        {{-- Academic Information --}}
        <fieldset class="border border-gray-200 rounded-lg p-4">
            <legend class="text-sm font-semibold text-gray-600 px-2">Academic Information</legend>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Student ID <span class="text-red-500">*</span></label>
                    <input type="text" name="student_id" value="{{ old('student_id') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('student_id') border-red-400 @enderror">
                    @error('student_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Program <span class="text-red-500">*</span></label>
                    <select name="program"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('program') border-red-400 @enderror">
                        <option value="">-- Select --</option>
                        @foreach (['BSIT', 'BSCS', 'BSIS', 'BSCE', 'BSCpE', 'BSEE'] as $p)
                            <option value="{{ $p }}" {{ old('program') == $p ? 'selected' : '' }}>{{ $p }}</option>
                        @endforeach
                    </select>
                    @error('program')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Year Level <span class="text-red-500">*</span></label>
                    <select name="year_level"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('year_level') border-red-400 @enderror">
                        <option value="">-- Select --</option>
                        @foreach ([1, 2, 3, 4, 5] as $y)
                            <option value="{{ $y }}" {{ old('year_level') == $y ? 'selected' : '' }}>Year {{ $y }}</option>
                        @endforeach
                    </select>
                    @error('year_level')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </fieldset>

        {{-- Contact Information --}}
        <fieldset class="border border-gray-200 rounded-lg p-4">
            <legend class="text-sm font-semibold text-gray-600 px-2">Contact Information</legend>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-400 @enderror">
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address <span class="text-red-500">*</span></label>
                    <input type="text" name="address" value="{{ old('address') }}"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 @error('address') border-red-400 @enderror">
                    @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </fieldset>

        {{-- Profile Picture --}}
        <fieldset class="border border-gray-200 rounded-lg p-4">
            <legend class="text-sm font-semibold text-gray-600 px-2">Profile Picture</legend>
            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Photo <span class="text-red-500">*</span> <span class="text-gray-400 text-xs">(JPG, JPEG, PNG — max 2MB)</span></label>
                <input type="file" name="profile_picture" accept="image/jpg,image/jpeg,image/png"
                    class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('profile_picture') border border-red-400 rounded @enderror">
                @error('profile_picture')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </fieldset>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-8 py-2 rounded-lg transition">
                Register Student
            </button>
        </div>
    </form>
</div>
@endsection
