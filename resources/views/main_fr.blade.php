<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>22Fevrier2019</title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link type="text/css" href="{{asset('css/main.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('assets/css/argon.css')}}" rel="stylesheet">

    <!-- Facebook OpenGraph -->
    <meta property="og:url" content="https://22fevrier2019.org/" />
     <meta property="fb:app_id" content="546361825856562" />
  	<meta property="og:type" content="website" />
    <meta property="og:title" content="22 Fevrier 2019" />
    <meta property="og:description" content="A website for free Algerians" />
    <meta property="og:image" content="{{asset('assets/img/share.png')}}" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="22 Fevrier 2019">
    <meta name="twitter:description" content="A website for free Algerians.">
    <meta name="twitter:image" content="{{asset('assets/img/share.png')}}">
    <meta name="twitter:domain" content="22fevrier2019.org">
    <!-- Hotjar Tracking Code for https://22fevrier2019.org/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1236816,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136151161-1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136151161-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-136151161-1');
    </script>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark" id="main-navbar">
        <div class="container">
            @auth
            <input type="hidden" value="true" id="auth_true">
            <button type="button" class="btn btn-success" id="main-btn-navbar" data-toggle="modal"
                data-target="#revendicationModal">Je propose ma revendication</button>
            @else
            <button type="button" class="btn btn-success" id="main-btn-navbar" data-toggle="modal"
                data-target="#loginModal">Veuillez vous connecter</button>
            @endauth
        </div>
    </nav>

    <div class="container">
        <div class="row" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-12">
                @if(Session::has('created_rev'))
                <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                    <span class="alert-inner--text" style="font-size:14px;">Votre revendication a été ajoutée avec succès</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="alert-inner--icon" style="margin: 0 20px;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                </div>
                @else
                <div class="alert alert-dismissible fade show text-center mt-3" role="alert" style="background-color: #F44336;">
                    <span class="alert-inner--text" style="font-size:14px;"><strong>Avertissement:</strong>  Nous effectuerons plusieurs mises à jour à fin de répondre à tous vos besoins.</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="alert-inner--icon" style="margin: 0 20px;"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container misc">
        <div class="row my-3">
            <div class="col-12">
                <ul class="nav nav-pills nav-pills-circle">
                    <li class="nav-item">
                        <a class="nav-link rounded-circle active top-button" id="filter-button">
                            <span class="nav-link-icon d-block"><i class="fa fa-filter" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="nav-link rounded-circle active top-button" id="about-us" data-toggle="modal" data-target="#modal-about-us">
                            <span class="nav-link-icon d-block"><i class="fa fa-question-circle"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container rev-container">
        <div class="row">
            <?php $i = 0; ?>
            @foreach($revendications as $revendication)
            <?php $i++; ?>
            <div class="{{$revendication->user->id == Auth::id() ? 'col-10 col-sm-12 mx-auto my-1 my-single-rev-container' : 'col-10 col-sm-12 mx-auto my-1 single-rev-container'}}">
                <input type="hidden" value="{{$revendication->id}}" id="{{'revendication-id-' . $i}}">
                <input type="hidden" value="{{Auth::id()}}" id="{{'user-id-' . $i}}">
                <div class="single-rev-content-container">
                    <div class="single-rev-text-container">
                        <p class="single-rev-text">{{$revendication->content}}</p>
                    </div>
                    <div class="single-rev-reactions-container">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-12 col-rev-icons">
                                    <span class="love-react">
                                        <span class="love-react-icon">
                                            <i id="{{'like-icon-' . $i}}" class="{{\App\Like::where('user_id',Auth::id())->where('revendication_id',$revendication->id)->first() != null ? 'fa fa-heart red-like like-reaction' : 'fa fa-heart-o like-reaction'}}" aria-hidden="true"></i>
                                        </span>
                                        <span class="love-react-total" id="{{'love-react-total-' . $i}}">{{$revendication->likes->count()}}</span>
                                    </span>
                                    <div style="display:inline;">
                                        <span class="chair-reaction">
                                            <span class="chair-react-icon">
                                                <i id="{{'dislike-icon-' . $i}}" class="{{\App\Dislike::where('user_id',Auth::id())->where('revendication_id',$revendication->id)->first() != null ? 'fa fa-thumbs-down purple-dislike dislike-reaction' : 'fa fa-thumbs-down dislike-reaction'}}" aria-hidden="true"></i>
                                            </span>
                                            <span class="chair-react-total" id="{{'chair-react-total-' . $i}}">{{$revendication->dislikes->count()}}</span>
                                            <span class="badge badge-pill badge-warning category-badge"><a href="{{'/filter?language=fr&order=popular&category=' . $revendication->category->id}}" style="color:#ff3709;">{{$revendication->category->french}}</a></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12 col-rev-share">
                                {!!Share::page('https://22fevrier2019.org', $revendication->content . " \n#22fevrier2019", [], '<ul class="social-share-icons share-rev-buttons" style="margin-bottom:0; margin-left: 0; padding-left:0;">', '</ul>')
                                    ->twitter()
                                !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <!-- modals -->
    <div class="modal fade" id="revendicationModal" tabindex="-1" role="dialog"
        aria-labelledby="revendicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="revendication-modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="revendication-modal-title">Proposez votre revendication!</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('revendication.create')}}" method="post" id="revendication-add-form">
                        {{csrf_field()}}
                        <textarea id="text-area" class="form-control form-control-alternative" rows="5"
                            placeholder="exprimez-vous ..." name="content" maxlength="280"></textarea>
                        <div class="row">
                            <div class="col-12">
                                <select class="my-3" name="category" id="category-select">
                                    <?php $i=0; ?>
                                    @foreach($categories as $category)
                                    <?php $i++ ?>
                                        <option value="{{$category->id}}">{{$category->french}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="words-left-container mt-3 text-center">
                        <span class="badge" style="background-color: #fff; font-size:14px;"><span style="color: #525f7f;">Il vous reste <span id="words-left" style="color: #dd3333; font-size: 16px;">280</span> caractères</span></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-secondary" id="revendication-add">Valider</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white pb-5">
                            <div class="text-muted text-center mb-3">
                                <small>Connecter vous avec</small>
                            </div>
                            <div class="btn-wrapper text-center">
                                <a href="{{ url('/auth/facebook') }}" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon">
                                        <img src="{{asset('assets/img/icons/common/facebook.svg')}}">
                                    </span>
                                    <span class="btn-inner--text modal-social-text">Facebook</span>
                                </a>
                                <a href="{{ url('/auth/google') }}" class="btn btn-neutral btn-icon">
                                    <span class="btn-inner--icon">
                                        <img src="{{asset('assets/img/icons/common/google.svg')}}">
                                    </span>
                                    <span class="btn-inner--text modal-social-text">Google</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-about-us" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm modal-xs modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">A propos</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p id="about-text">Alger, 13 mars 2019 - Lancé aujourd’hui, <a href="/fr">“www.22fevrier2019.org”</a>  est un site internet réalisé par des jeunes algériens. Il a pour but de centraliser les revendications citoyennes et de faire émerger une plateforme légitime et représentative du mouvement de changement que vit l’Algérie. <br>

                    La révolution algérienne en cours, incarne la beauté de l’Algérie. Une Algérie moderne et citoyenne, une Algérie inclusive et unie, une Algérie jeune et libre. “Comment peut on transformer ce mouvement du peuple en un véritable changement sur le terrain”, c’est à cette question récurrente qu’un groupe de jeunes tente de répondre à travers le développement de ce site web. <br>

                    L’objectif de <a href="/fr">“www.22fevrier2019.org”</a> est de constituer une plateforme de revendication à laquelle pourra participer chaque Algérien. Chaque citoyen peut proposer une revendication, il peut aussi donner un vote positif ou négatif pour les revendications proposées par ces concitoyens. <br>

                    La peur de récupération politique de ce mouvement, rend les algériens méfiants à l’égard des politiques de tous bords, c’est pourquoi la nécessité d’une telle plateforme c’est imposé à nous. <br>

                    Le rôle que joue internet et les réseaux sociaux dans l’expression des revendications du peuple est indéniable. Ce site est un moyen de plus pour les algériens de s’organiser afin de faire aboutir le mouvement.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto" data-dismiss="modal">Confirmer</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-privacy" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-sm modal-xs modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Terms of service</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    Toute personne utilisant le site 22fevrier2019.org s’engage à respecter les conditions d’utilisation ci-dessous : <br><br>
                    <strong>Définitions:</strong><br><br>
                    <div style="padding-left:40px;">
                        <strong>Plateform </strong> désigne le site web <a href="https://22fevrier2019.org">www.22fevrier2019.org</a><br>
                        <strong>Site </strong> désigne le site web <a href="https://22fevrier2019.org">www.22fevrier2019.org</a><br>
                        <strong>Émetteur/Utilisateur </strong> désigne la personne qui publie un contenu multimédia (texte, image, vidéo) sur le site web <a href="https://22fevrier2019.org">www.22fevrier2019.org</a><br>
                        <strong>Webmasters</strong> désigne le collectif fondateur du site web <a href="https://22fevrier2019.org">www.22fevrier2019.org</a><br>
                    </div>
                    <br>
                    <ul>
                        <li>Toute proposition de revendication publiée sur le site est la propriété de son émetteur (personne l'ayant publié).</li>
                        <li>L’utilisateur qui publie une revendication sur le site s’engage à respecter les lois de la république algérienne.</li>
                        <li>Il est interdit de diffamer, insulter ou porter atteinte directement ou indirectement à des personnes. Dans le cas échéant, la proposition de revendication sera supprimée par les webmasters du site.</li>
                        <li>Les propositions de revendication doivent être rédigées dans un langage respectueu. Toute insulte ou “phrase irrespectueuse” entraînera la suppression de la proposition de revendication.</li>
                        <li>Les propositions de revendication sont classées selon le nombre de votes positifs des utilisateurs de la plateforme. Les webmasters du site n’interviennent pas dans le classement des revendications.</li>
                        <li>Après la publication d’une proposition de revendication, aucune modification ne peut lui être apportée, ni par son émetteur, ni par les webmasters de la plateforme.</li>
                        <li>La plateforme s’engage à ne pas utiliser les informations recueillies sur les utilisateurs à un autre usage que de les prévenir d’éventuelles nouveautés sur la plateforme.</li>
                        <li>Les données utilisateurs recueillies sont sécurisées et cryptées, afin de garantir l’anonymat et la sécurité de nos utilisateurs.</li>
                    </ul>
                    <br>
                    <strong>À propos de la plateforme </strong>
                    <br>
                    <br>
                    <ul>
                        <li>La plateforme est un outil destiné à rassembler et organiser les revendications politiques. Elle s’abstient de donner son avis sur quelque question que se soit.</li>
                        <li>La plateforme et apartisane, elle n’est engagée dans aucun courant ou parti politique.</li>
                        <li>Le collectif fondateur de la plateforme 22fevrier2019 souhaite rester anonyme pour le moment, dans le but de mettre en avant les propositions et non pas les personnes.</li>
                    </ul>                
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto" data-dismiss="modal">Confirmer</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg modal-filter" role="document">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h6 class="modal-title" id="modal-title-default">Filtrer</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="/filter" id="filter-form">
                        <div class="row p-3 pr-5">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-2">
                                        <label style="font-weight:600;">Langage: </label>
                                    </div>
                                    <div class="col-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="language" class="custom-control-input" id="customRadio1" type="radio" value="ar">
                                                    <label class="custom-control-label" for="customRadio1">Arabe</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="language" class="custom-control-input" id="customRadio2" checked="" type="radio" value="fr">
                                                    <label class="custom-control-label" for="customRadio2">Français</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-2">
                                        <label style="font-weight:600;">Ordre: </label>
                                    </div>
                                    <div class="col-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-12 col-sm-3">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="order" class="custom-control-input" id="customRadio3" checked="" type="radio" value="popular">
                                                    <label class="custom-control-label" for="customRadio3">Popularité</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input name="order" class="custom-control-input" id="customRadio4" type="radio" value="newest">
                                                    <label class="custom-control-label" for="customRadio4">Nouveauté</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-2">
                                    <label style="font-weight:600;">Catégory: </label>
                                    </div>
                                    <div class="col-12 col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-4 col-6">
                                                <div class="mb-3">
                                                    <select name="category" id="category-select">
                                                        <option value="0">Toutes</option>
                                                        <?php $i=0; ?>
                                                        @foreach($categories as $category)
                                                        <?php $i++ ?>
                                                            <option value="{{$category->id}}">{{$category->french}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto" id="filter-form-submit">Confirmer</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Back to top -->
    <button class="back-to-top" type="button"></button>

    <footer>
        <div class="container">
        <div class="row">
            <div class="col-3">
            {!!Share::page('https://22fevrier2019.org', null, [], '<ul class="social-share-icons"><span class="share-text footer-to-hide">Share: </span>', '</ul>')
                ->facebook()
                ->twitter()
                !!}
            </div>
            <div class="col-3">
            <span style="font-weight:600;">
                    <span>Contribute: </span><a href="https://github.com/22fevrier2019/22fevrier2019" target="_blank" ><img width="25" height="25" src="{{asset('/assets/img/icons/common/github.svg')}}"></a> 
                </span>
            </div>
            <div class="col-3">
                <p class="email-class" style="font-weight:600; margin-bottom: 0px;"><span>Email: </span><a href="mailto:contact@22fevrier2019.org" class="email-email"><img width="25" src="{{asset('assets/img/mail.svg')}}"></a></p>
            </div>
            <div class="col-3">
                <p class="conditions" style="font-weight:600;">Privacy: <img id="privacy-button" width="25" src="{{asset('assets/img/privacy.svg')}}"></p>
            </div>
        </div>
        </div>
            <table class="mx-auto donate-container">
                <tr>
                    <td><p class="footer-text" style="display:inline;">Support us by donating: &nbsp</p></td>
                    <td>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="display:inline;">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="XGYSKR4FZB5HN">
                            <input id="paypal-button" class="paypal-button" class="hex-icon-heart" width="40" type="image" src="{{asset('assets/img/heart-1.svg')}}" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </td>
                </tr>
            </table>
    </footer>

    <!-- Core -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <!-- Theme JS -->
    <script src="{{asset('/assets/js/argon.js')}}"></script>
    <!-- Laravel Share -->
    <script src="{{ asset('js/share.js') }}"></script>

    <script>
    $(document).ready(function() {
        /*window.onresize = function(){
            console.log(window.innerWidth);
        }*/

        /* Terms of use */
        $('#privacy-button').on('click', function(){
            $('#modal-privacy').modal('show');
        });


        $('#filter-button').on('click', function(){
            $('#modal-filter').modal('show');
        });
        
        var form = $("#revendication-add-form");
        $('#revendication-add').on("click", function () {
            form.submit();
        });

        var filter_form = $("#filter-form");
        $('#filter-form-submit').on("click", function () {
            filter_form.submit();
        });

        form.on('submit',function(){
        console.log('submiting');
            $('#revendication-add').attr('disabled','true');
        });

        filter_form.on('submit',function(){
        console.log('submiting');
            $('#filter-form-submit').attr('disabled','true');
        });

        /*Words left */
        var maxLength = 280;
        $('textarea').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#words-left').text(textlen);
        });

        /* Donate Animation */
        var state = 0;
        var paypalButton = $('#paypal-button');
        setInterval(() => {
            switch(state){
                case 0 :
                    paypalButton.attr('src','/assets/img/heart-1.svg');
                    state = 1;
                    break;
                case 1:
                    paypalButton.attr('src','/assets/img/heart-2.svg');
                    state = 2;
                    break;
                case 2:
                    paypalButton.attr('src','/assets/img/heart-3.svg');
                    state = 0;
                    break;
                default: break;
            }       
        }, 500);



        /* Ajax Requests */
    /*    $('.like-reaction').on('click',function(event){
            var revendication_index = event.target.id[event.target.id.length - 1];
            console.log(revendication_index);
        });*/

        /* Love React */
        var auth = $('#auth_true');
        $('.like-reaction').on('click',function(event){
            if(auth.val() == 'true'){
                var revendication_index = event.target.id.replace( /^\D+/g, '');
            if($('#dislike-icon-' + revendication_index).hasClass('purple-dislike')){
                var real_target = $('#dislike-icon-' + revendication_index);
                like(revendication_index,event.target);
                dislike(revendication_index,event.target,real_target);
            }else{
                like(revendication_index,event.target);
             }
            }else{
                $('#loginModal').modal('show');
            } 
        });


            /* Chair React */
            $('.dislike-reaction').on('click',function(event){
            if(auth.val() == 'true'){
            var revendication_index = event.target.id.replace( /^\D+/g, '');
            if($('#like-icon-' + revendication_index).hasClass('red-like')){
                var real_target = $('#like-icon-' + revendication_index);
                dislike(revendication_index,event.target);
                like(revendication_index,event.target,real_target);
            }else{
                dislike(revendication_index,event.target);
            }
            }else{
                $('#loginModal').modal('show');
            }
        });


        function like(revendication_index,target,real_target){
            var love_reacts_total = $('#love-react-total-' + revendication_index);
            if($('#like-icon-' + revendication_index).hasClass('red-like')){
                if(real_target == null){
                    whiteHeart(target);
                }else{
                    whiteHeartJquery(real_target);
                }
                love_reacts_total.html(parseInt(love_reacts_total.text(),10) - 1);
                if(parseInt(love_reacts_total.text(),10) < 0){
                    love_reacts_total.html('0');
                }
            }else{
                redHeart(target);
                love_reacts_total.html(parseInt(love_reacts_total.text(),10) + 1);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });
            $.ajax({
                url: '/revendication/like',
                type : 'post',
                data: {
                    revendication_id: $('#revendication-id-' + revendication_index).val(),
                    user_id: $('#user-id-' + revendication_index).val()
                },
                dataType: 'JSON',
                success: function(result){
                    console.log(result);
                },
                error: function(error){
                    console.log(error);
                }
            });
        }


        function dislike(revendication_index,target,real_target){
            var chair_reacts_total = $('#chair-react-total-' + revendication_index);
            if($('#dislike-icon-' + revendication_index).hasClass('purple-dislike')){
                if(real_target == null){
                    whiteChair(target);
                }else{
                    whiteChairJquery(real_target);
                }
                chair_reacts_total.html(parseInt(chair_reacts_total.text(),10) - 1);
                if(parseInt(chair_reacts_total.text(),10) < 0){
                    chair_reacts_total.html('0');
                }
            }else{
                purpleChair(target);
                chair_reacts_total.html(parseInt(chair_reacts_total.text(),10) + 1);

            }
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    }
                });
                $.ajax({
                    url: '/revendication/dislike',
                    type : 'post',
                    data: {
                        revendication_id: $('#revendication-id-' + revendication_index).val(),
                        user_id: $('#user-id-' + revendication_index).val()
                    },
                    dataType: 'JSON',
                    success: function(result){
                        console.log(result);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
        }


        function redHeart(target_var){
            target_var.classList.remove('fa-heart-o');
            target_var.classList.add('fa-heart');
            target_var.classList.add('red-like');
        }

        function whiteHeart(target_var){
            target_var.classList.remove('fa-heart');
            target_var.classList.remove('red-like');
            target_var.classList.add('fa-heart-o');
        }

        function whiteHeartJquery(target_var){
            target_var.removeClass('fa-heart');
            target_var.removeClass('red-like');
            target_var.addClass('fa-heart-o');
        }

        function purpleChair(target_var){
            target_var.classList.add('purple-dislike');
        }

        function whiteChair(target_var){
            target_var.classList.remove('purple-dislike');
        }

        function whiteChairJquery(target_var){
            target_var.removeClass('purple-dislike');
        }

        // Back to top
        var amountScrolled = 200;
        var amountScrolledNav = 25;

        $(window).scroll(function() {
        if ( $(window).scrollTop() > amountScrolled ) {
            $('button.back-to-top').addClass('show');
        } else {
            $('button.back-to-top').removeClass('show');
        }
        });

        $('button.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
        });

    });


    </script>
</body>

</html>