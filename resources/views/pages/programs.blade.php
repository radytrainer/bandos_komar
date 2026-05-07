@extends('layouts.app')

@section('styles')
<style>
    #programModalPanel {
        position: relative;
        max-width: 760px;
    }

    .program-modal-header {
        display: grid;
        grid-template-columns: 2rem 1fr 2rem;
        align-items: flex-start;
        gap: 1rem;
    }

    #programModalTitle {
        grid-column: 2;
        padding-right: 0;
        text-align: center;
    }

    #programModalClose {
        grid-column: 3;
        display: flex;
        width: 2rem;
        height: 2rem;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        justify-self: end;
        border-radius: 9999px;
        font-size: 1.6rem;
        line-height: 1;
    }

    .program-modal-image-wrap {
        margin-top: 2rem;
        width: 100%;
        overflow: hidden;
        border-radius: 0.5rem;
        background: #f3f4f6;
    }

    #programModalImage {
        display: block;
        width: 100%;
        height: auto;
        max-height: 48vh;
        object-fit: contain;
    }
</style>
@endsection

@section('content')
@php
    $sections = [
        [
            'title' => 'Integrated Early Childhood Care and Development Program (IECCD)',
            'text' => 'By 2029, boys and girls under 6 years old who are beneficiaries will receive care and development with potential and opportunities to continue their education at the primary level with quality, equity and inclusion education',
            'cards' => [
                [
                    'title' => 'Health and Nutrition',
                    'description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                    'full_description' => 'Rate of births attended by skilled provider is at 2014-2022, from 96% to 99%. Exclusive breastfeeding (0-5 months) increased from 11% in 2000 to 74% in 2010, but declined to 51% in 2021-2022. High rates of stunting, wasting and underweight children: 22% stunted, 22% underweight, 16% wasting, 10%.',
                    'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                ],
                [
                    'title' => 'Clean Water & Sanitation',
                    'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                    'full_description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable sanitation and hygiene support to protect children from preventable illness.',
                    'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                ],
                [
                    'title' => 'Early Learning Challenges',
                    'description' => 'Many children fall behind in school due to poor early learning. Only 12% of 3-year-olds, 28% of 4-year-olds, and 57% of 5-year-olds access early learning.',
                    'full_description' => 'Many children fall behind in school due to poor early learning. Only 12% of 3-year-olds, 28% of 4-year-olds, and 57% of 5-year-olds access early learning opportunities before primary school.',
                    'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1400&auto=format',
                ],
                [
                    'title' => 'Caregiver Knowledge',
                    'description' => 'Around 73% of children under age 3 are cared for by grandmothers with limited knowledge of early childhood care and development practices.',
                    'full_description' => 'Around 73% of children under age 3 are cared for by grandmothers with limited knowledge of early childhood care and development practices, creating a need for stronger caregiver guidance and family support.',
                    'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1400&auto=format',
                ],
            ],
        ],
        [
            'title' => 'Integrated Quality Basic Education Program (IQBE)',
            'text' => 'By 2029, girls and boys aged 6-15 in target areas have access to education with quality learning outcome and complete basic education with equity and inclusiveness',
            'cards' => [
                [
                    'title' => 'Health and Nutrition',
                    'description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                    'full_description' => 'Skilled birth attendance rose from 96% to 99% (2014-2022). Exclusive breastfeeding rates climbed from 65% to 80%, supporting healthier starts for young children.',
                    'image' => 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?q=80&w=1400&auto=format',
                ],
                [
                    'title' => 'Clean Water & Sanitation',
                    'description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                    'full_description' => 'Access to safe water remains a major challenge. 20% of schools lack water service entirely, and many families still need reliable hygiene support.',
                    'image' => 'https://images.unsplash.com/photo-1508189860359-777d945909ef?q=80&w=1400&auto=format',
                ],
            ],
        ],
    ];
@endphp

<section class="bg-white pt-8 pb-2 md:pt-12">
    <div class="mx-auto max-w-[980px] px-5 md:px-6">
        <div class="text-center">
            <h1 class="text-4xl md:text-[2.7rem] font-extrabold text-bk-navy leading-tight">
                Our Program
            </h1>
        </div>

        @foreach($sections as $section)
            <div class="mx-auto mt-8 max-w-[860px] text-center">
                <h2 class="text-2xl md:text-[1.7rem] font-extrabold text-bk-navy leading-snug">
                    {{ $section['title'] }}
                </h2>
                <p class="mx-auto mt-4 max-w-[800px] text-base leading-relaxed text-bk-navy">
                    {{ $section['text'] }}
                </p>
            </div>

            @if(!empty($section['cards']))
                <div class="mx-auto mt-16 grid max-w-[960px] grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($section['cards'] as $program)
                        <article
                            class="program-card overflow-hidden rounded-md bg-white shadow-[0_3px_12px_rgba(15,23,42,0.14)] ring-1 ring-gray-100 cursor-pointer transition-transform hover:-translate-y-1"
                            data-title="{{ $program['title'] }}"
                            data-description="{{ $program['full_description'] ?? $program['description'] }}"
                            data-image="{{ $program['image'] }}"
                        >
                            <div class="h-40 w-full overflow-hidden bg-gray-100">
                                <img
                                    src="{{ $program['image'] }}"
                                    alt="{{ $program['title'] }}"
                                    class="h-full w-full object-cover"
                                >
                            </div>

                            <div class="p-5">
                                <h3 class="text-base font-extrabold text-gray-950 leading-snug">
                                    {{ $program['title'] }}
                                </h3>
                                <p class="mt-3 min-h-[4.5rem] text-xs leading-relaxed text-gray-500 line-clamp-4">
                                    {{ \Illuminate\Support\Str::limit($program['description'], 105) }}
                                </p>
                                <button type="button" class="program-learn-more mt-4 inline-flex items-center text-xs font-extrabold text-blue-600 hover:text-bk-orange transition-colors">
                                    Learn More&nbsp;&rarr;
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</section>

<div id="programModal" class="fixed inset-0 z-[1100] hidden items-center justify-center bg-black/60 px-4 py-8">
    <div id="programModalPanel" class="max-h-[90vh] w-full overflow-y-auto rounded-lg bg-white p-6 md:p-10 shadow-2xl">
        <div class="program-modal-header">
            <h2 id="programModalTitle" class="text-2xl md:text-3xl font-extrabold text-gray-950 leading-tight"></h2>
            <button type="button" id="programModalClose" class="text-gray-500 hover:bg-gray-100 hover:text-bk-navy transition-colors" aria-label="Close modal">
                &times;
            </button>
        </div>

        <div class="program-modal-image-wrap">
            <img id="programModalImage" src="" alt="">
        </div>
        <p id="programModalDescription" class="mt-8 text-lg leading-relaxed text-gray-700"></p>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const programModal = document.getElementById('programModal');
    const programModalPanel = document.getElementById('programModalPanel');
    const programModalTitle = document.getElementById('programModalTitle');
    const programModalImage = document.getElementById('programModalImage');
    const programModalDescription = document.getElementById('programModalDescription');
    const programModalClose = document.getElementById('programModalClose');

    function openProgramModal(card) {
        programModalTitle.textContent = card.dataset.title;
        programModalDescription.textContent = card.dataset.description;
        programModalImage.src = card.dataset.image;
        programModalImage.alt = card.dataset.title;
        programModal.classList.remove('hidden');
        programModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeProgramModal() {
        programModal.classList.add('hidden');
        programModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    document.querySelectorAll('.program-card').forEach((card) => {
        card.addEventListener('click', () => openProgramModal(card));
    });

    programModalClose.addEventListener('click', closeProgramModal);

    programModal.addEventListener('click', (event) => {
        if (!programModalPanel.contains(event.target)) {
            closeProgramModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !programModal.classList.contains('hidden')) {
            closeProgramModal();
        }
    });
</script>
@endsection
