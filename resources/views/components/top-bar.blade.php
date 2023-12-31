 <div
     class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
     <div class="h-full flex items-center">
         <!-- BEGIN: Logo -->
         <a href="" class="logo -intro-x hidden md:flex xl:w-[180px] block">
             <img alt="Logo bank Sampah PNG" class="logo__image w-10"
                 src="https://ebanksampah.unilak.ac.id/assets/images/logo256x256.png">
             <span class="logo__text text-white text-lg ml-2 mt-1"> Bank Sampah </span>
         </a>
         <!-- END: Logo -->
         <!-- BEGIN: Breadcrumb -->
         <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
             <ol class="breadcrumb breadcrumb-light">
                 @forelse ($generate_breadcrumb(url()->current()) as $segment)
                     <li class="breadcrumb-item capitalize"><a>{{ str_replace(['-', '_'], ' ', $segment) }}</a></li>
                 @empty
                     <li class="breadcrumb-item capitalize"><a>Dashboard</a></li>
                 @endforelse
             </ol>
         </nav>
         <!-- END: Breadcrumb -->
         <!-- BEGIN: Account Menu -->
         @if (auth()->user())
             <div class="intro-x dropdown w-8 h-8">
                 <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                     role="button" aria-expanded="false" data-tw-toggle="dropdown">
                     <img alt="Logo User"
                         src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                         load="lazy">
                 </div>
                 <div class="dropdown-menu w-56">
                     <ul
                         class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                         <li class="p-2">
                             <div class="font-medium">{{ auth()->user()->name }}</div>
                             <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">
                                 {{ str_replace('_', ' ', auth()->user()->role) }}</div>
                         </li>
                         <li>
                             <hr class="dropdown-divider border-white/[0.08]">
                         </li>
                         <li>
                             <hr class="dropdown-divider border-white/[0.08]">
                         </li>
                         <li>
                             <a href="{{ route('auth.logout') }}" class="dropdown-item hover:bg-white/5"> <i
                                     data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                         </li>
                     </ul>
                 </div>
             </div>
         @else
             <div class="intro-x">
                 <a href="{{ route('auth.login') }}" class="btn bg-white text-primary">Login Admin</a>
             </div>
         @endif
         <!-- END: Account Menu -->
     </div>
 </div>
