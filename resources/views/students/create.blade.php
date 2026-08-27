@extends('layouts.app')

@section('title', 'Register Student')

@section('content')
<div class="min-h-screen bg-[#f5f0e8] py-10 px-4">

    @if ($errors->any())
        <div class="max-w-2xl mx-auto mb-4 bg-red-100 border border-red-400 text-red-700 rounded-xl p-4">
            <p class="font-semibold mb-1">Please fix the following errors:</p>
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="flex justify-center mb-3">
                <div class="w-14 h-14 rounded-full bg-[#f5f0e8] flex items-center justify-center">
                    <svg class="w-7 h-7 text-[#5a7a5a]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800" style="font-family: Georgia, serif;">Student Registration Form</h1>
            <p class="text-gray-400 text-sm mt-2">Please fill in all the required information to register a new student.</p>
            <div class="flex items-center justify-center mt-4 gap-2">
                <div class="h-px w-24 bg-gray-200"></div>
                <span class="text-yellow-400 text-lg">✦</span>
                <div class="h-px w-24 bg-gray-200"></div>
            </div>
        </div>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Personal Information --}}
            <div class="border border-gray-200 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-gray-700 text-base">Personal Information</span>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">First Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            </span>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('first_name') border-red-400 @enderror">
                        </div>
                        @error('first_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Middle Name</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            </span>
                            <input type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="Enter middle name"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Last Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            </span>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('last_name') border-red-400 @enderror">
                        </div>
                        @error('last_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                            </span>
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('date_of_birth') border-red-400 @enderror">
                        </div>
                        @error('date_of_birth')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Gender <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            </span>
                            <select name="gender"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 appearance-none @error('gender') border-red-400 @enderror">
                                <option value="">-- Select --</option>
                                @foreach (['Male', 'Female', 'Other'] as $g)
                                    <option value="{{ $g }}" {{ old('gender') == $g ? 'selected' : '' }}>{{ $g }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                            </span>
                        </div>
                        @error('gender')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Mobile Number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                            </span>
                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="09XXXXXXXXX"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('mobile_number') border-red-400 @enderror">
                        </div>
                        @error('mobile_number')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Academic Information --}}
            <div class="border border-gray-200 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-full bg-gray-100 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-gray-700 text-base">Academic Information</span>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Student ID <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h4M7 12h8M7 16h5"/></svg>
                            </span>
                            <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="Enter student ID"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('student_id') border-red-400 @enderror">
                        </div>
                        @error('student_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Program <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg>
                            </span>
                            <select name="program"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 appearance-none @error('program') border-red-400 @enderror">
                                <option value="">-- Select --</option>
                                @foreach (['BSIT', 'BSCS', 'BSIS', 'BSCE', 'BSCpE', 'BSEE'] as $p)
                                    <option value="{{ $p }}" {{ old('program') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                            </span>
                        </div>
                        @error('program')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Year Level <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                            </span>
                            <select name="year_level"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 appearance-none @error('year_level') border-red-400 @enderror">
                                <option value="">-- Select --</option>
                                @foreach ([1, 2, 3, 4, 5] as $y)
                                    <option value="{{ $y }}" {{ old('year_level') == $y ? 'selected' : '' }}>Year {{ $y }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                            </span>
                        </div>
                        @error('year_level')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div class="border border-gray-200 rounded-2xl p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-full bg-yellow-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-yellow-600 text-base">Contact Information</span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="example@email.com"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('email') border-red-400 @enderror">
                        </div>
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            </span>
                            <input type="text" name="address" value="{{ old('address') }}" placeholder="Enter complete address"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#5a7a5a]/30 @error('address') border-red-400 @enderror">
                        </div>
                        @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Profile Picture --}}
            <div class="border border-gray-200 rounded-2xl p-6 bg-[#f8f7fc]">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 rounded-full bg-[#e8e6f5] flex items-center justify-center">
                        <svg class="w-5 h-5 text-[#5a5a8a]" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 15.2A3.2 3.2 0 1012 8.8a3.2 3.2 0 000 6.4zM9 2L7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3.17L15 2H9zm3 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                        </svg>
                    </div>
                    <span class="font-semibold text-gray-700 text-base">Profile Picture</span>
                </div>

                <label class="block text-xs font-medium text-gray-600 mb-3">
                    Upload Photo <span class="text-red-500">*</span>
                    <span class="text-gray-400 font-normal">(JPG, JPEG, PNG — max 2MB)</span>
                </label>

                <label for="profile_picture_input"
                    class="flex flex-col items-center justify-center border-2 border-dashed border-[#b0a8d8] rounded-xl py-8 px-4 cursor-pointer hover:bg-[#f0eef8] transition">
                    <svg class="w-10 h-10 text-[#5a5a8a] mb-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.35 10.04A7.49 7.49 0 0012 4C9.11 4 6.6 5.64 5.35 8.04A5.994 5.994 0 000 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
                    </svg>
                    <p class="text-sm text-gray-500">Drag and drop your photo here</p>
                    <p class="text-xs text-gray-400 my-2">or</p>
                    <span class="bg-[#5a7a5a] hover:bg-[#4a6a4a] text-white text-sm font-medium px-6 py-2 rounded-lg transition">Choose File</span>
                    <p id="file_name" class="text-xs text-gray-400 mt-2"></p>
                </label>
                <input id="profile_picture_input" type="file" name="profile_picture" accept="image/jpg,image/jpeg,image/png" class="hidden"
                    onchange="document.getElementById('file_name').textContent = this.files[0]?.name ?? ''">
                @error('profile_picture')<p class="text-red-500 text-xs mt-2">{{ $message }}</p>@enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-[#5a7a5a] hover:bg-[#4a6a4a] text-white font-semibold py-3.5 rounded-xl transition text-base tracking-wide flex items-center justify-center gap-2">
                Register Student
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>

        </form>
    </div>
</div>
@endsection
