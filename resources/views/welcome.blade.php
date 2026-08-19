<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Monitoring</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js for interactive Modal state -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans flex antialiased" x-data="{ openModal: false }">

    <!-- Navigation / Sidebar -->
    <aside class="w-64 bg-slate-800 text-white min-h-screen p-5 flex flex-col justify-between hidden md:flex">
        <div>
            <h1 class="text-xl font-bold mb-8 flex items-center gap-2">
                <i class="fa-solid fa-clipboard-user text-blue-400"></i> AMS Portal
            </h1>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-2 bg-blue-600 rounded-lg text-white font-medium">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-slate-700 rounded-lg text-gray-300 transition">
                    <i class="fa-solid fa-user-graduate"></i> Students
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-slate-700 rounded-lg text-gray-300 transition">
                    <i class="fa-solid fa-calendar-check"></i> Attendance Logs
                </a>
            </nav>
        </div>
        <div class="border-t border-slate-700 pt-4">
            <a href="#" class="flex items-center gap-3 px-4 py-2 hover:bg-slate-700 rounded-lg text-gray-300">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="flex-1 flex flex-col min-h-screen">

        <!-- Header -->
        <header class="bg-white shadow-sm p-4 flex justify-between items-center px-8">
            <h2 class="text-xl font-semibold text-gray-800">Attendance Monitoring</h2>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-600">Admin User</span>
                <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <!-- Main Body -->
        <main class="p-8 flex-1 space-y-6">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Students</p>
                        <h3 class="text-2xl font-bold text-gray-800">120</h3>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg"><i class="fa-solid fa-users text-xl"></i></div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Present Today</p>
                        <h3 class="text-2xl font-bold text-emerald-600">108</h3>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-lg"><i class="fa-solid fa-user-check text-xl"></i></div>
                </div>
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Absent Today</p>
                        <h3 class="text-2xl font-bold text-rose-600">12</h3>
                    </div>
                    <div class="p-3 bg-rose-50 text-rose-600 rounded-lg"><i class="fa-solid fa-user-xmark text-xl"></i></div>
                </div>
            </div>

            <!-- Main Content Area with Actions & Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
                
                <!-- Action Buttons Header -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-gray-100 pb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Attendance Records</h3>
                    <div class="flex gap-3">
                        <button class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            <i class="fa-solid fa-list"></i> View All Logs
                        </button>
                        
                        <!-- Open Modal Trigger Button -->
                        <button @click="openModal = true" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition cursor-pointer">
                            <i class="fa-solid fa-plus"></i> Add Attendance
                        </button>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                                <th class="p-3">Student Name</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Remarks</th>
                                <th class="p-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($attendances as $attendance)
                                <tr>
                                    <td class="p-3 font-medium">{{ $attendance->name }}</td>
                                    <td class="p-3 text-gray-500">{{ \Carbon\Carbon::parse($attendance->date)->diffForHumans() }}</td>
                                    <td class="p-3 text-gray-500">{{ $attendance->status }}</td>
                                    <td class="p-3 text-gray-500">{{ $attendance->remarks }}</td>
                                    <td class="p-3 text-right">
                                        <button class="text-blue-600 hover:underline text-sm">Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-500">
                                        No attendance records found.
                                    </td>
                                </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-100 p-4 text-center text-xs text-gray-500">
            &copy; 2026 Attendance Monitoring System. All rights reserved.
        </footer>

    </div>

        <!-- ================= ADD ATTENDANCE MODAL ================= -->
        <div 
            x-show="openModal" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
            style="display: none;" p-6
        >
            <!-- Modal Container -->
            <div 
                @click.away="openModal = false"
                class="bg-white rounded-xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all"
            >
                <!-- Modal Header -->
                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <i class="fa-solid fa-user-plus text-blue-600"></i> Add Attendance Record
                    </h3>
                    <button @click="openModal = false" class="text-gray-400 hover:text-gray-600 text-xl font-bold">
                        &times;
                    </button>
                </div>

                <!-- Modal Form Body -->
                <form action="{{ route('attendance.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf <!-- Add Laravel CSRF Token here if using Laravel -->

                    <!-- Select Student -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Select Student</label>
                        <select name="name" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="" disabled selected>Choose a student...</option>
                            <option value="Juan Dela Cruz (2026-001) 2026-001">Juan Dela Cruz (2026-001)</option>
                            <option value="Maria Clara (2026-002) 2026-002">Maria Clara (2026-002)</option>
                            <option value="Jose Rizal (2026-003) 2026-003">Jose Rizal (2026-003)</option>
                        </select>
                    </div>

                    <!-- Date & Status (Grid) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input type="date" name="date" value="2026-08-19" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="present">Present</option>
                                <option value="late">Late</option>
                                <option value="absent">Absent</option>
                                <option value="excused">Excused</option>
                            </select>
                        </div>
                    </div>

                    <!-- Remarks/Notes -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Remarks (Optional)</label>
                        <textarea name="remarks" rows="3" placeholder="e.g., Excused due to medical appointment" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"></textarea>
                    </div>

                    <!-- Modal Actions / Buttons -->
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" @click="openModal = false" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Save Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </form>
</body>
</html>