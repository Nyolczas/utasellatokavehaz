<div class="container py-4 mb-4">
    <div class="row flex-wrap pt-5 pb-4">
        <div class="col-12 col-lg-7 col-xl-8 mb-5 mb-lg-0">
            <div class="keret mb-0">
                <div class="keret-bel p-4">
                    <h2 class="text-center heading mb-4">Köszöntjük az Utasellátó Kávéházban</h2>
                    <p>
                        A Magyar Vasúttörténeti Park <b>Magyarország egyik legizgalmasabb interaktív parkja.</b>
A több, mint százéves mozdony-csodák között sétálva az ember úgy érezheti, visszarepül az időben. Ennek fényében épült fel a park területén az <b>Utasellátó Kávéház</b>  is, ahol az élmények sokasága után megpihenhet az ember.
                    </p>
                    <p>
                        Akár egy finom frissensültre vágyik, akár egy különleges kávéra, kézműves süteményre, vagy egy igazi, hamisíthatatlan csavaros fagyira, mi mindig szeretettel és mosollyal fogadjuk vendégeinket. Számunkra a legfontosabb, hogy a család összes tagja, a legapróbbaktól a legidősebbekig megelégedettséggel távozzon, és a következő kirándulásuk alkalmával újra betérjenek hozzánk is.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-4">
            <div class="blackboard p-5 text-center">
                <h2 class="heading text-gold">Nyitvatartás</h2>
                <h4 class="text-gold mb-5"><b>Április 1 - Október 31.</b></h4>
                @if(isset($opening[1]))
                    @for ($i = 1; $i < 7; $i++)
                    <h5 class="text-off-white mb-3">{{ $opening[$i]->time }}</h5>
                    @endfor
                @endif    
            </div>
        </div>
    </div>
</div>
