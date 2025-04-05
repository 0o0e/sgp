@extends('layouts.app')

@section('title', 'World Lore')

@section('content')
<style>
    .lore-section {
        margin-bottom: 4rem;
    }

    .lore-title {
        font-family: 'Cinzel', serif;
        font-size: 2.5rem;
        color: var(--accent-color);
        margin-bottom: 2rem;
        text-align: center;
        text-shadow: 0 0 10px rgba(193, 125, 89, 0.3);
    }

    .lore-card {
        background-color: var(--card-background);
        border-radius: 8px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(193, 125, 89, 0.1);
    }

    .lore-card h2 {
        font-family: 'Cinzel', serif;
        color: var(--accent-color);
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }

    .lore-card p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }

    .lore-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 4px;
        margin: 2rem 0;
    }

    .lore-quote {
        font-style: italic;
        color: var(--accent-color);
        font-size: 1.2rem;
        text-align: center;
        margin: 2rem 0;
        padding: 1rem;
        border-left: 4px solid var(--accent-color);
        background-color: rgba(193, 125, 89, 0.1);
    }
</style>

<div class="lore-section">
    <h1 class="lore-title">The World of Soul Guardians</h1>

    <div class="lore-card">
        <h2>The In-Between</h2>
        <p>After death, the souls are sent to the in-between to work as guardians. There are two types: guardian angels and guardian devils. They reflect the life lived by the soul. There are also two subcategories which are: fallen angels and redeemed devils which occur depending on the soul's behaviour as they work.</p>
        <p>Guardians are assigned to children from ages 4-12. The earlier years are taken care of by deceased family members that have yet to enter the In-Between. By 10, the child's connection to their paired Guardian/s begins to wane until they turn 12, which is when their Guardian/s leave to be assigned to another child.</p>
    </div>

    <div class="lore-card">
        <h2>The Council</h2>
        <p>The guardians are part of a larger organisation known as "Epitropos" or simply known as "The Council". There are two other main organisations: "Anastasis", the organisation of Haunts and "Nakhal" which is comprised solely on exorcists with some secret assistance from a few higher up members of The Council.</p>
        <p>Anastasis is an organisation focused on resurrection with their main goal of bringing back their leader from Limbo. The Haunts use the remaining years of children to remain in the living world and are the source of the cracks which bleed the in-between out into the world.</p>
    </div>

    <div class="lore-quote">
        "Within the ranks of The Council, there are double agents and hidden spies that have infiltrated so as to make sure their fellow Haunts remain safe and able to continue their work."
    </div>

    <div class="lore-card">
        <h2>The Guides</h2>
        <p>Assisting The Council are "Guides": a helpful species that are the natural inhabitants of the In-Between. They pair with Guardians and the stronger the bond, the more intelligent the guide becomes; however that is a double-edged sword as, if the bond weakens, the Guide will become less lifelike and more like a robot.</p>
        <p>Guides are beings that are made up of life energy and assist Guardians when traversing realms the living world and with tasks.</p>
    </div>

    <div class="lore-card">
        <h2>The Great War</h2>
        <p>In the past, there were quite a few small disputes between Guardian Angel's and Guardian Devils in which the Guides did their bests to mediate but even they couldn't stop the war that lasted a thousand years. Ever since, there are still stigmas, reprehensions, and hesitance when faced with the other type of guardian.</p>
    </div>

    <div class="lore-card">
        <h2>The Founders</h2>
        <p>Before Guides and before the In-Between had either name or form, there were two lost souls that were confined; they later became known as the Founders. As more and more souls begun getting stuck, the Founders took charge, kept the peace, and helped to form what we all know as the 'City of Nirvana' with the highest point being named 'Elysium'.</p>
        <p>The story goes that one of the Founders grew hateful and malicious, wanting to return back to the world of the living. They built up an army of like-minded souls and rallied against the other Founder, however they lost and were cast out, becoming forever lost to the darkness as the City was sealed.</p>
        <p>However, the truth is that the Founders had both started to become corrupted by the darkness and their minds began narrating different stories and, with each disagreement, with each passing remark, their delusions of the other grew greater and greater until both saw each other as enemies that needed to be dealt with for the peace of all.</p>
    </div>
</div>
@endsection 