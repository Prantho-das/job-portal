@extends('layouts.frontend')

@section('title', 'Job Details - BGEA Jobs')

@section('content')

<div class="bg-white py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-lg p-6 md:p-8">

            {{-- Header --}}
            <div class="md:flex justify-between items-start mb-6">
                <div class="flex-grow">
                    <a href="{{ url('/jobs') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 flex items-center mb-4">
                        <svg class="h-5 w-5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        Job List
                    </a>
                    <div class="flex items-center">
                        <img class="h-12 w-auto object-contain mr-4" src="https://placehold.co/100x50/e2e8f0/334155?text=Logo" alt="Company logo">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Assistant Merchandiser (Jackets/Outerwear)</h1>
                            <p class="text-base text-gray-600">Beximco Textiles</p>
                        </div>
                    </div>
                </div>
                <div class="text-left md:text-right flex-shrink-0 mt-4 md:mt-0 md:ml-6">
                    <p class="text-sm text-gray-500 flex items-center md:justify-end">
                        <svg class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        Deadline: 31 Oct 2025
                    </p>
                    <div class="mt-3 flex items-center gap-x-2">
                        <button id="apply-now-btn" type="button" class="flex-grow text-center px-5 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">
                            Apply Now
                        </button>
                        <button class="p-2.5 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path d="M5 4h10a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2zm0 1a1 1 0 00-1 1v6a1 1 0 001 1h10a1 1 0 001-1V6a1 1 0 00-1-1H5z"></path><path d="M6 12a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zM4 8a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zM3 15a1 1 0 100 2h14a1 1 0 100-2H3z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                    <a href="#" class="bg-yellow-50 border-yellow-400 text-gray-800 whitespace-nowrap py-3 px-4 border-b-2 font-semibold text-sm rounded-t-md">All</a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm">Requirements</a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm">Responsibilities</a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm">Skills & Expertise</a>
                    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-4 border-b-2 font-medium text-sm">Company Information</a>
                </nav>
            </div>

            {{-- Job Details --}}
            <div class="mt-8">
                {{-- Summary --}}
                <div class="bg-sky-50 p-6 rounded-lg">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Summary</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-4 text-sm">
                        <div><span class="font-semibold text-gray-600">Vacancy:</span> <span class="text-gray-800">02</span></div>
                        <div><span class="font-semibold text-gray-600">Published:</span> <span class="text-gray-800">21 Oct 2025</span></div>
                        <div><span class="font-semibold text-gray-600">Location:</span> <span class="text-gray-800">Dhaka (Savar)</span></div>
                        <div><span class="font-semibold text-gray-600">Experience:</span> <span class="text-gray-800">3 to 5 years</span></div>
                        <div><span class="font-semibold text-gray-600">Age:</span> <span class="text-gray-800">28 to 35</span></div>
                        <div><span class="font-semibold text-gray-600">Gender:</span> <span class="text-gray-800">Only Male</span></div>
                        <div><span class="font-semibold text-gray-600">Salary:</span> <span class="text-gray-800">Negotiable</span></div>
                        <div><span class="font-semibold text-gray-600">Education:</span> <span class="text-gray-800">Bachelor of Science</span></div>
                    </div>
                </div>

                <div class="mt-8 text-sm text-gray-700 space-y-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Requirements</h3>
                        <div class="mt-4 space-y-4">
                            <div>
                                <h4 class="font-semibold">Education</h4>
                                <ul class="mt-2 list-disc list-inside space-y-1 pl-2">
                                    <li>Bachelor of Science (BSc) in Textile Engineering</li>
                                    <li>Diploma in Engineering in Textile Engineering</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold">Experience</h4>
                                <ul class="mt-2 list-disc list-inside space-y-1 pl-2">
                                    <li>3 to 5 years</li>
                                    <li>The applicants should have experience in the following business area(s): Garments, Textile, Buying House, Garments Accessories</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold">Additional Requirements</h4>
                                <p class="mt-2">The applicants should have experience in the following business area(s): Garments, Textile, Buying House, Garments Accessories</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Responsibilities & Context</h3>
                        <ul class="mt-4 list-disc list-inside space-y-2 pl-2">
                            <li>Assist the Merchandiser in handling day-to-day communication with buyers regarding jackets (especially outerwear).</li>
                            <li>Work on product development, sample handling, and ensuring all samples (Proto, Fit, PP, etc.) are submitted and approved on time.</li>
                            <li>Prepare and update Bill of Materials (BOM), and assist in developing and maintaining the Time and Action (TNA) calendar.</li>
                            <li>Coordinate with suppliers and internal departments (fabric sourcing, trims, production, planning, etc.) to ensure all materials are in-house on time.</li>
                            <li>Follow up with factories for production updates, sample status, and ensure production meets buyer requirements.</li>
                            <li>Assist in price negotiations and costing sheet preparations when required.</li>
                            <li>Support in maintaining order files, approvals, shipping documents, and records.</li>
                            <li>Assist in tracking orders from order confirmation to shipment and post-shipment documentation.</li>
                            <li>Communicate fit comments, size specs, and approvals with the technical team and factory.</li>
                            <li>Work under the guidance of the Merchandiser and take initiative to learn and grow.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Skills & Expertise</h3>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-200 rounded-full">Jackets</span>
                            <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-200 rounded-full">Outerwear</span>
                            <span class="px-3 py-1 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-200 rounded-full">Sweater</span>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm pt-4">
                        <div class="flex"><h4 class="font-bold w-40 flex-shrink-0">Workplace:</h4><span>Work at office</span></div>
                        <div class="flex"><h4 class="font-bold w-40 flex-shrink-0">Employment Status:</h4><span>Full Time</span></div>
                        <div class="flex"><h4 class="font-bold w-40 flex-shrink-0">Gender:</h4><span>Only Male</span></div>
                        <div class="flex"><h4 class="font-bold w-40 flex-shrink-0">Job Location:</h4><span>Dhaka (Savar)</span></div>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Company Information</h3>
                        <div class="mt-4 space-y-3">
                            <p class="font-semibold">Beximco Textiles</p>
                            <p><span class="font-semibold">Address:</span> Beximco Industrial Park, Sarabo, Kashimpur, Gazipur, Gazipur.</p>
                            <p><span class="font-semibold">Business:</span> Beximco Textiles & Apparel Division (BexTex) of Bangladesh Export Import Company Limited is the most modern composite mill in the region. It has an installed capacity of 288 high-speed air-jet looms in its weaving section, as well as a high-tech dyeing and finishing section with a capacity of 100,000 yards of finished fabric per day. The company is located at the BEXIMCO Industrial Park.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div id="apply-modal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg p-8 relative">
        <button id="close-modal-btn" class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <h2 class="text-xl font-bold text-gray-900">Upload CV</h2>
        <p class="mt-2 text-sm text-gray-600">Please fill out the form below, upload your CV or résumé, and click the submit button.</p>

        <form class="mt-6 space-y-5">
            <div>
                <label for="full_name" class="sr-only">Full Name</label>
                <input type="text" id="full_name" placeholder="Full Name*" class="w-full px-4 py-3 border-transparent bg-gray-100 rounded-md text-sm focus:bg-white focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" placeholder="Email*" class="w-full px-4 py-3 border-transparent bg-gray-100 rounded-md text-sm focus:bg-white focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <label for="mobile" class="sr-only">Mobile</label>
                <input type="text" id="mobile" placeholder="Mobile*" class="w-full px-4 py-3 border-transparent bg-gray-100 rounded-md text-sm focus:bg-white focus:ring-2 focus:ring-red-500">
            </div>
            <div>
                <div class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                                <span>Click or drag the file here to upload</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">Only support PDF & WORD format The maximum file is limited to 2MB</p>
                    </div>
                </div>
                <div class="mt-2 p-3 bg-gray-50 border border-gray-200 rounded-md flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3.75 2.116A2.116 2.116 0 002.116 3.75v12.5c0 1.17.946 2.116 2.116 2.116h12.5a2.116 2.116 0 002.116-2.116V7.884a2.116 2.116 0 00-.62-1.496L13.62 1.504A2.116 2.116 0 0012.125 1H5.884A2.116 2.116 0 003.75 2.116zM8.5 7.25a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5zM10.75 5a.75.75 0 01.75.75v8.5a.75.75 0 01-1.5 0v-8.5a.75.75 0 01.75-.75zm2.25 2.5a.75.75 0 00-1.5 0v5.5a.75.75 0 001.5 0v-5.5z"></path></svg>
                        <span class="text-sm ml-2 text-gray-800">Md-Karim-CV.doc</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <button class="ml-3 text-gray-500 hover:text-gray-700">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-6">
                <input id="agree" name="agree" type="checkbox" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                <label for="agree" class="ml-3 block text-sm text-gray-900">I agree to have my CV stored.</label>
            </div>
            <div class="flex justify-end space-x-4 pt-6">
                <button type="button" id="cancel-btn" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Cancel</button>
                <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const applyModal = document.getElementById('apply-modal');
        const applyNowBtn = document.getElementById('apply-now-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        const openModal = () => applyModal.classList.remove('hidden');
        const closeModal = () => applyModal.classList.add('hidden');

        if (applyNowBtn) {
            applyNowBtn.addEventListener('click', openModal);
        }
        if(closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }
        if(cancelBtn) {
            cancelBtn.addEventListener('click', closeModal);
        }

        if(applyModal) {
            applyModal.addEventListener('click', (event) => {
                if (event.target === applyModal) {
                    closeModal();
                }
            });
        }
    });
</script>

@endsection
