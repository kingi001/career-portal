<footer class="fixed bottom-0 left-0 z-20 w-full bg-white shadow-md dark:bg-blue-800 border-t border-gray-300">
    <div class="w-full mx-auto max-w-screen-xl px-3 py-2 text-xs flex flex-col md:flex-row md:items-center md:justify-between">

        <!-- Copyright Section (Always Visible) -->
        <span class="text-center text-blue-600 dark:text-blue-300 flex items-center justify-center md:justify-start">
            © 2025 COPYRIGHT : E-RECRUITMENT SYSTEM
        </span>

        <!-- Footer Items (Hidden on Mobile, Shown on Medium Screens and Above) -->
        <ul class="hidden md:flex flex-wrap justify-center md:justify-end items-center mt-1 md:mt-0 text-blue-600 dark:text-blue-300 space-x-4 md:space-x-6">
            <li class="flex items-center">
                <i class="fa fa-leaf mr-1"></i> V1.0
            </li>
            <li class="flex items-center">
                <i class="fa fa-briefcase mr-1"></i> LICENSED TO BANDARI MARITIME ACADEMY
            </li>
            <li class="flex items-center uppercase">
                <i class="fa fa-user mr-1"></i> {{ Auth::user()->name }}
            </li>
        </ul>
    </div>
</footer>

