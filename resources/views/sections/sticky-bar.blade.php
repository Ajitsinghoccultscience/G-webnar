@props([
    'ctaHref' => '#',
    'ctaText' => 'Reserve My Seat @₹49',
    'seats'   => '7',
    'hours'   => 48,
    'minutes' => 3,
    'seconds' => 12,
])

{{-- Sticky bottom offer bar --}}
<div id="sticky-offer-bar" class="fixed bottom-0 left-0 right-0 z-50 bg-button-gradient shadow-[0_-2px_16px_rgba(0,0,0,0.25)]">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-2.5 md:py-3 flex flex-row items-center justify-between gap-3 md:gap-6">

        {{-- Left: label on top, timer boxes below --}}
        <div class="flex flex-col items-start gap-1.5 w-full sm:w-auto">

            {{-- Text --}}
            <div class="flex items-baseline gap-1.5 whitespace-nowrap">
                <span class="font-bold text-neutral-b text-xs md:text-base uppercase tracking-wide leading-none">OFFER ENDS IN</span>
                <span class="text-neutral-b/80 text-xs md:text-sm leading-none">(Only {{ $seats }} seats are left)</span>
            </div>

            {{-- Timer boxes --}}
            <div class="flex items-end gap-1">
                {{-- Hours --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-hours" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($hours, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Hours</span>
                </div>

                <span class="text-neutral-b font-bold text-base md:text-2xl mb-3 leading-none">:</span>

                {{-- Minutes --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-mins" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($minutes, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Min</span>
                </div>

                <span class="text-neutral-b font-bold text-base md:text-2xl mb-3 leading-none">:</span>

                {{-- Seconds --}}
                <div class="flex flex-col items-center gap-0.5">
                    <div class="bg-neutral-b rounded-md px-1.5 md:px-3 py-1 md:py-2 min-w-[36px] md:min-w-[56px] text-center">
                        <span id="sb-secs" class="text-neutral-i font-bold text-base md:text-2xl leading-none tabular-nums">{{ str_pad($seconds, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <span class="text-neutral-b text-[9px] md:text-xs font-medium leading-none">Sec</span>
                </div>
            </div>
        </div>

        {{-- Right: CTA button --}}
        <a href="{{ $ctaHref }}"
           class="bg-neutral-b text-neutral-i font-bold text-xs md:text-base px-3 md:px-8 py-2.5 md:py-3 rounded-10 whitespace-nowrap hover:bg-neutral-a transition-colors duration-200 shrink-0 text-center">
            {{ $ctaText }}
        </a>

    </div>
</div>

{{-- Push page content above the sticky bar --}}
<div class="h-[76px] md:h-[80px]"></div>

<script>
(function () {
    const TOTAL = {{ ($hours * 3600) + ($minutes * 60) + $seconds }};
    const KEY   = 'sb_timer_end';

    const elH = document.getElementById('sb-hours');
    const elM = document.getElementById('sb-mins');
    const elS = document.getElementById('sb-secs');

    function pad(n) { return String(n).padStart(2, '0'); }

    function getEndTime() {
        const stored = localStorage.getItem(KEY);
        const now    = Math.floor(Date.now() / 1000);
        if (stored && parseInt(stored) > now) return parseInt(stored);
        const end = now + TOTAL;
        localStorage.setItem(KEY, end);
        return end;
    }

    let endTime = getEndTime();

    function tick() {
        const now       = Math.floor(Date.now() / 1000);
        let   remaining = endTime - now;

        if (remaining <= 0) {
            endTime = Math.floor(Date.now() / 1000) + TOTAL;
            localStorage.setItem(KEY, endTime);
            remaining = TOTAL;
        }

        elH.textContent = pad(Math.floor(remaining / 3600));
        elM.textContent = pad(Math.floor((remaining % 3600) / 60));
        elS.textContent = pad(remaining % 60);
    }

    tick();
    setInterval(tick, 1000);
})();
</script>
