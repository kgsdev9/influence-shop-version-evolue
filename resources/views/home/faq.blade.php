@extends('layout')
@section('content')
<main>
    <div class="py-8 bg-light">
      <div class="container">
        <div class="row">
          <div class="offset-md-2 col-md-8 col-12">
            <h1 class="fw-bold mb-1 display-4">Foire Aux Questions (FAQ)</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- container  -->

    <section class="py-8">
      <div class="container">
        <div class="row mb-6">
          <div class="offset-md-2 col-md-8 col-12">
            <div class="d-flex flex-column gap-4">
              <div class="">
                <h2 class="mb-0 fw-semibold"></h2>
              </div>
              <div class="accordion accordion-flush" id="accordionFAQ">

                <!-- Question 1 -->
                <div class="border p-3 rounded-3 mb-2" id="faqOne">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQOne" aria-expanded="false" aria-controls="collapseFAQOne">
                      <span class="me-auto">1. Comment puis-je m'inscrire à un partenariat avec VTP Group ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQOne" class="collapse" aria-labelledby="faqOne" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Pour participer à un partenariat, vous devez créer un compte sur notre plateforme, remplir votre profil avec vos informations de marque ou d'influenceur, et postuler à une campagne ou un partenariat qui vous intéresse. Nous vous contacterons ensuite pour discuter des modalités.
                    </div>
                  </div>
                </div>

                <!-- Question 2 -->
                <div class="border p-3 rounded-3 mb-2" id="faqTwo">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQTwo" aria-expanded="false" aria-controls="collapseFAQTwo">
                      <span class="me-auto">2. Quels critères sont utilisés pour sélectionner les marques et les influenceurs ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQTwo" class="collapse" aria-labelledby="faqTwo" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Nous sélectionnons les marques et les influenceurs en fonction de plusieurs critères, notamment la compatibilité de leurs valeurs avec celles de la marque, leur audience et leur engagement sur les réseaux sociaux, ainsi que leur capacité à promouvoir des produits de manière authentique et créative.
                    </div>
                  </div>
                </div>

                <!-- Question 3 -->
                <div class="border p-3 rounded-3 mb-2" id="faqThree">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQThree" aria-expanded="false" aria-controls="collapseFAQThree">
                      <span class="me-auto">3. Comment puis-je suivre la performance de mon partenariat ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQThree" class="collapse" aria-labelledby="faqThree" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Vous pouvez suivre la performance de votre partenariat directement depuis votre tableau de bord. Vous y trouverez des statistiques détaillées sur la portée, l'engagement, et les conversions générées par vos publications et collaborations.
                    </div>
                  </div>
                </div>

                <!-- Question 4 -->
                <div class="border p-3 rounded-3 mb-2" id="faqFour">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQFour" aria-expanded="false" aria-controls="collapseFAQFour">
                      <span class="me-auto">4. Quels types de campagnes sont disponibles sur VTP Group ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQFour" class="collapse" aria-labelledby="faqFour" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Nous proposons divers types de campagnes, y compris des campagnes de contenu sponsorisé, des tests de produits, des collaborations créatives, et des campagnes d'influence pour des lancements de produits. Vous pouvez postuler pour la campagne qui correspond le mieux à votre profil.
                    </div>
                  </div>
                </div>

                <!-- Question 5 -->
                <div class="border p-3 rounded-3 mb-2" id="faqFive">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQFive" aria-expanded="false" aria-controls="collapseFAQFive">
                      <span class="me-auto">5. VTP Group offre-t-il des supports de formation pour les influenceurs ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQFive" class="collapse" aria-labelledby="faqFive" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Oui, nous proposons des ressources et des formations pour aider les influenceurs à améliorer leurs compétences en matière de marketing et de gestion de campagnes. Vous pouvez accéder à ces supports une fois inscrit sur notre plateforme.
                    </div>
                  </div>
                </div>

                <!-- Question 6 -->
                <div class="border p-3 rounded-3 mb-2" id="faqSix">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQSix" aria-expanded="false" aria-controls="collapseFAQSix">
                      <span class="me-auto">6. Comment puis-je obtenir un paiement pour mes campagnes ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQSix" class="collapse" aria-labelledby="faqSix" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Une fois votre collaboration terminée et les résultats confirmés, les paiements sont effectués par virement bancaire ou via les méthodes de paiement que vous avez spécifiées lors de votre inscription. Vous recevrez un récapitulatif de votre paiement dans votre profil.
                    </div>
                  </div>
                </div>

                <!-- Question 7 -->
                <div class="border p-3 rounded-3 mb-2" id="faqSeven">
                  <h3 class="mb-0 fs-4">
                    <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFAQSeven" aria-expanded="false" aria-controls="collapseFAQSeven">
                      <span class="me-auto">7. Comment puis-je contacter le support en cas de problème ?</span>
                      <span class="collapse-toggle ms-4">
                        <i class="fe fe-chevron-down"></i>
                      </span>
                    </a>
                  </h3>
                  <div id="collapseFAQSeven" class="collapse" aria-labelledby="faqSeven" data-bs-parent="#accordionFAQ">
                    <div class="pt-2">
                      Vous pouvez nous contacter via l'adresse email suivante : support@vtpgroup.com ou par téléphone au 01 23 45 67 89. Notre équipe est disponible pour répondre à toutes vos questions et résoudre vos problèmes rapidement.
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
