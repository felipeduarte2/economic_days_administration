<x-guest-layout>
    <div class="flex justify-center py-12">
        <div>
            <a href=" {{ route('login') }} "
                class="cursor-pointer transition-all bg-blue-500 text-white px-6 py-2 rounded-lg
                    border-blue-600
                    border-b-[4px] hover:brightness-110 hover:-translate-y-[1px] hover:border-b-[6px]
                    active:border-b-[2px] active:brightness-90 active:translate-y-[2px]">
                Iniciar sesión
            </a>
        </div>
    </div>

</x-guest-layout>
