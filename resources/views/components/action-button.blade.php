{{-- 標準ボタン --}}
<button
    {{ $attributes->merge(['type' => 'submit', 'class' =>'group inline-flex justify-center items-center px-4 py-2 bg-sub-color rounded-md font-normal text-base text-white-color uppercase tracking-widest shadow shadow-slate-500 hover:bg-sub-dark-color ']) }}>
    {{ $slot }}
</button>
