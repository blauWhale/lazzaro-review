<main class="main">

    <section class="jumbotron text-center">
        <div class="container">
            <img src="/images/lazzaroLogo.png" class="img-fluid" alt="Logo">
        </div>
    </section>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8" id="page-title">
                    <h4>Kontakt</h4>
                </div>
                <div class="col-md-3">
                    <form action="/" method="get" onsubmit="return validateSearch()" name="searchValidator">
                        <input class="form-control"  list="datalistOptions" name="searchContent"
                               placeholder="Type to search...">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="/contact/sendForm" onsubmit="return validateContact()" method="post" name="contactValidator">
                            <div class="card-body" id="kontaktformular">
                                <h5 class="card-title">Unser Kontaktformular:</h5>
                                <input class="form-control" list="datalistOptions" name="vorname"
                                       placeholder="Vorname" required>
                            </div>
                            <div class="card-body">
                                <input class="form-control" list="datalistOptions" name="nachname"
                                       placeholder="Nachname" required>
                            </div>
                            <div class="card-body">
                                <input class="form-control" list="datalistOptions" name="email"
                                       placeholder="E-Mail" required>
                            </div>
                            <div class="form-group">
                                <textarea name="msg" cols="30" rows="5" class="form-control" style="background-color: white;" placeholder="Deine Nachricht:" required></textarea>
                            </div>
                            <button type="submit" name="sendMail" class="btn btn-outline-primary">Absenden</button>
                    </form>
                </div>

                <div class="col-md-3">
                    <div class="list-group">
                        <h5>Unsere Adresse</h5>
                        <a href="#" class="list-group-item list-group-item-action">
                            Lazzaro Reviews
                            Bahnhofstrasse 204
                            8001 Zürich
                            Tel +414440220402
                            lazzaro@reviews.ch
                        </a>

                    </div>
                </div>
            </div>
        </div>

</main>

</div>

