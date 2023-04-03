<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benifits</title>
    <link rel="stylesheet" href="CSS/benifits.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</head>
<body>
<?php
    include("nav.php ");
    ?>

    <section id="searchModal">
        <div class="container">

            <!-- Modal.1 -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="search" class="form-control"id="searchBox"
                                    placeholder="What are you looking for?">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
       <div class="allbody">
        <div class="bdy">
            <h1 id="headline">Why do we plant tree?</h1>
            <p id="hp">Trees give off oxygen that we need to breathe. Trees reduce the amount of storm water runoff,
                 which reduces erosion and pollution in our waterways and may reduce the effects of flooding.
                  Many species of wildlife depend on trees for habitat. Trees provide food, protection, and 
                  homes for many birds and mammals.For one thing, the importance of trees is immense for every
                   living being</p>
        </div><br>
        <div class="body">
            <div class="image1">
            <img class="img1" src="Resources/Images/EB.jpg" alt="">
        </div>
        <!--
        <div class="Ehead"></div>-->
        <h2 class="Eheading">Environment Benifits</h2>
        <p class="ep">The realization of <span>agroforestry systems</span> allows to make precise choices in relation to
             the specific characteristics and needs of each project area.<span>The tree species planted are native
              or respect the biodiversity of the different territories</span>. The agroforestry practice also 
              integrates the planting of trees in an agricultural system, favoring the virtuous interaction
               between the different species and a sustainable use of resources and land. Finally, all trees 
               <span>absorb CO<sub>2</sub></span> in the course of their growth, naturally generating a benefit for the entire planet.</p>
            <!--</div>-->
       
       <div class="SB">
        <h2 class="Sheading">Social Benifits</h2>
        <p class="sb">Treedom finances projects in rural communities in many countries of the world and also carries out
             projects with a strong social value in Italy. The first step is the training and financing of the communities
              involved in the projects, obtaining extraordinary results in terms of their own empowerment. The trees and
               their fruits belong to the farmers, allowing them to diversify and supplement their income and in some cases
                to launch micro-entrepreneurship initiatives. Financing the planting of new trees with Treedom serves to 
                support the trees' care in the first years of their life, when they are not yet productive in terms of fruit.</p>

               <img class="img2" src="Resources/Images/SB.jpg" alt="">
           
        </div>
       
       </div>
       <div class="econo">
        <h2 class="Ecoheading">Economic benefits</h2><br>
        <p class="Eco">Trees provide numerous economic benefits. Trees can <span>increase the economic revenue for retail shops,
             prevent unnecessary costs of road maintenance, and increase property values</span>. Explore the following resources,
              which explain how trees can aid the economy.<br><br>
            <span>1.</span> The City of Tea Tree Gully is known for its green, leafy street, parks, reserves and open spaces. Trees define our character as a city<br>
            <span>2.</span> Trees provide a range of everyday recreational opportunities such as organised sport, walking the dog or a family picnic. They help forge a sense of connection to place<br>
            <span>3.</span> Established parks and streets with trees encourage the use of open spaces and healthy, connected communities<br>
            <span>4.</span> Green spaces are said to have a strong connection to reduced anxiety and improved wellbeing.</p>
            <img class="Ecoimg" src="Resources/Images/MB.jpg" alt="">
       </div>
    </div>
</div>
</div>
</section>

<?php
    include("footer.php ");
    ?>
</body>
</html>