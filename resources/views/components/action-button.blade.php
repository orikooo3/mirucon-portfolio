{{-- 標準ボタン --}}
<button
    {{ $attributes->merge(['type' => 'submit', 'class' =>'group inline-flex justify-center items-center w-44 px-4 py-2 bg-main-color rounded-md font-semibold text-base text-white-color uppercase tracking-widest shadow shadow-slate-500 hover:bg-main-hover-color hover:text-black-color']) }}>
    {{ $slot }}
</button>
