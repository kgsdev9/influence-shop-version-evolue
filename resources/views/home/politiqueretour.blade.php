@extends('layout')

@section('content')
    <main>
        <div class="py-8 bg-light">
            <div class="container">
                <div class="row">
                    <div class="offset-md-2 col-md-8 col-12">
                        <h1 class="fw-bold mb-4 display-4">Politique de Retour</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-8">
            <div class="container">
                <div class="row mb-6">
                    <div class="offset-md-2 col-md-8 col-12">
                        <div class="d-flex flex-column gap-4">
                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">1. Introduction</h3>
                                <p>La Politique de Retour de VTP Group décrit les conditions dans lesquelles les produits
                                    achetés sur notre plateforme peuvent être retournés. Nous nous engageons à vous fournir
                                    une expérience d'achat de qualité, et nous comprenons que parfois un retour peut être
                                    nécessaire. Veuillez lire attentivement les informations suivantes concernant notre
                                    politique de retour.</p>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">2. Conditions de Retour</h3>
                                <p>Pour être éligible à un retour, les conditions suivantes doivent être remplies :</p>
                                <ul>
                                    <li>Les produits doivent être retournés dans leur état et emballage d'origine, non
                                        utilisés, non endommagés et complets.</li>
                                    <li>Les retours doivent être effectués dans un délai de 14 jours après la réception de
                                        la commande.</li>
                                    <li>Le produit ne doit pas être un article personnalisé ou un produit qui, pour des
                                        raisons de santé ou d'hygiène, ne peut pas être retourné (ex : produits cosmétiques,
                                        vêtements intimes, etc.).</li>
                                    <li>Les produits retournés doivent être accompagnés de la preuve d'achat (facture ou
                                        reçu).</li>
                                </ul>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">3. Processus de Retour</h3>
                                <p>Si vous souhaitez retourner un produit, veuillez suivre les étapes suivantes :</p>
                                <ol>
                                    <li>Contactez notre service client à l'adresse <a
                                            href="mailto:support@vtpgroup.com">support@vtpgroup.com</a> pour obtenir
                                        l'autorisation de retour et les instructions spécifiques.</li>
                                    <li>Préparez le produit dans son emballage d'origine, avec tous les accessoires,
                                        notices, etc.</li>
                                    <li>Expédiez le produit à l'adresse de retour fournie par notre équipe de support
                                        client.</li>
                                    <li>Une fois le retour réceptionné et vérifié, nous traiterons votre demande de
                                        remboursement ou d'échange selon vos préférences.</li>
                                </ol>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">4. Remboursement ou Échange</h3>
                                <p>Après avoir vérifié l'état du produit retourné, nous procéderons à un remboursement ou à
                                    un échange en fonction de votre demande :</p>
                                <ul>
                                    <li><strong>Remboursement</strong> : Le remboursement sera effectué par le même moyen de
                                        paiement que celui utilisé pour la commande initiale. Le montant sera crédité sur
                                        votre compte dans un délai de 10 à 14 jours ouvrés après l'acceptation du retour.
                                    </li>
                                    <li><strong>Échange</strong> : Si vous souhaitez échanger un produit, nous organiserons
                                        l'expédition du produit de remplacement une fois que nous aurons reçu et vérifié
                                        l'article retourné.</li>
                                </ul>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">5. Frais de Retour</h3>
                                <p>Les frais de retour sont à la charge de l'acheteur, sauf si le produit est défectueux ou
                                    endommagé à la réception. Dans ce cas, nous couvrirons les frais de retour et
                                    organiserons une prise en charge pour le produit retourné.</p>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">6. Produits Défectueux ou Endommagés</h3>
                                <p>Si vous recevez un produit défectueux, endommagé ou incorrect, veuillez contacter notre
                                    service client dans un délai de 7 jours suivant la réception de la commande. Nous
                                    organiserons un retour sans frais et un remplacement ou remboursement complet du produit
                                    concerné.</p>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">7. Articles Non Éligibles au Retour</h3>
                                <p>Certains articles sont non éligibles au retour pour des raisons de sécurité, d'hygiène ou
                                    de personnalisation. Cela inclut, mais sans s'y limiter :</p>
                                <ul>
                                    <li>Les articles personnalisés ou gravés selon les spécifications de l'acheteur.</li>
                                    <li>Les produits ouverts ou utilisés, comme les produits cosmétiques ou les
                                        sous-vêtements.</li>
                                    <li>Les produits périssables, comme la nourriture ou les médicaments.</li>
                                </ul>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">8. Délai de Retour</h3>
                                <p>Les retours doivent être effectués dans un délai de 14 jours suivant la réception de la
                                    commande. Passé ce délai, nous ne pourrons pas accepter le retour du produit.</p>
                            </div>

                            <div class="border p-4 rounded-3 mb-4">
                                <h3 class="fw-semibold">9. Contact</h3>
                                <p>Si vous avez des questions concernant notre politique de retour ou souhaitez démarrer un
                                    retour, n'hésitez pas à nous contacter :</p>
                                <p><a href="mailto:support@vtpgroup.com">support@vtpgroup.com</a></p>
                                <p>Numéro de téléphone : <strong>07 68 36 58 66</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
