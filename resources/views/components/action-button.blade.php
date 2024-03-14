{{-- 標準ボタン --}}
<button
    {{ $attributes->merge(['type' => 'submit', 'class' =>'group inline-flex justify-center items-center px-4 py-2 bg-main-color rounded-md font-semibold text-base text-white-color uppercase tracking-widest shadow shadow-slate-500 hover:bg-main-dark-color ']) }}>
    {{ $slot }}
</button>
