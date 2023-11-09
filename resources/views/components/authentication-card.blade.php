<div>
    <div></div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 px-4 sm:pt-0 bg-opacity-60 bg-[url('/public/images/FondoBoutique.png')] bg-cover bg-center h-screen">
        <div>
            {{ $logo }}
        </div>
    
        <div class="w-full sm:max-w-md mt-6 mx-5 px-6 py-4 bg-amber-400 shadow-xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <div></div>
</div>