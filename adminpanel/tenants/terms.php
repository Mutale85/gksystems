<?php include('../../includes/db.php')?>
<?php require('../addons/tip.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../addon_header.php')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../addon_top_nav.php')?>
  
  <?php include('../addon_side_nav.php')?>
  <div class="content-wrapper">
    <?php include('../addon_content_head.php')?>
    <section class="content">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#LeaseModal">
                        Open the Lease agreement form
                    </button>
                </div>
                <div class="col-md-12">
                    <?php 
                        $currentYear = date('Y');
                        $query = $connect->prepare("SELECT * FROM `lease_agreements` WHERE tenant_phone = ? AND YEAR(`agreement_date`) = ? ");
                        $query->execute([$_SESSION['phonenumber'], $currentYear]);
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        extract($result);

                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Lease Agreement Terms</h1>
                        </div>
                        <div class="card-body">
                            <div class="" id="printDiv">
                                <h1 class="mb-3">Lease Agreement Terms</h1>
                                <p>THIS LEASE AGREEMENT made on the __<em><?php echo date('d', strtotime($agreement_date))?></em>____ day of ____<em><?php echo date('F, Y', strtotime($agreement_date))?></em>___ BETWEEN GIFT KATEBE of 1536/40, Milima Road,
                                    Woodlands, Lusaka in the District of the Lusaka Province in the Republic of Zambia (hereinafter called” The
                                    Landlord”) of the one part, and ______________<em><?php echo ucwords($tenant_name)?></em>__________________________ of Lusaka in the Republic of Zambia
                                    (Hereinafter called” The Tenant”) of the other part.</p>
                                <h2>WITNESSETH as follows:</h2>
                                <ol>
                                    <li>The Landlord hereby demises unto the tenant Flat _____<em><?php echo ucwords($flat_number)?></em>_____ of Subdivision of 1536/40 Milima Road,
                                        Lusaka situate in the Lusaka Province of the Republic of Zambia.<br>
                                        TO HOLD unto the tenant for a fixed term of one year from the ____<em><?php echo date('d', strtotime($agreement_date))?></em>_____ day of ___<em><?php echo date('F, Y', strtotime($agreement_date))?></em>_______ for a term of one (1) year PAYING therefore the calendar monthly rent of <em><?php echo ucwords($currency)?></em>_________________
                                        (______<em><?php echo $rent_amount ?></em>_________________________ Kwacha), payable _________ (____) months in advance.</li>
                                    <li>The Tenant hereby agrees to pay a security deposit of <em><?php echo ucwords($currency)?></em>___<em><?php echo $rent_amount ?></em>____________
                                        _________________________ , equal to one (1) month’s rental, refunded upon vacating the premises
                                        and returning the keys to the Landlord upon expiry or termination of the contract according to other terms
                                        herein agreed. The deposit will:
                                        <ol type="i">
                                            <li>be held to cover any possible damage to the property;</li>
                                            <li>NOT attract any interest payment;</li>
                                            <li>in no case be applied to back or future rent;</li>
                                            <li>be held intact by the Landlord until at least thirty (30) working days after Tenants have
                                                vacated the property. At that time, the Landlord will inspect the property/premises thoroughly and
                                                assess any damage and/or needed repairs; and fix any damages to the interior itemized in Part 2 (c)
                                                of this agreement including the cleaning of the premises.</li>
                                            <li>be refunded to the Tenant minus any necessary charges arising out of any damages/repair and
                                                cleaning referred to I (iv) above and with a written explanation of deductions, within sixty (60)
                                                days after they have vacated the property/premises.</li>
                                        </ol>
                                    </li>
                                    <li>THE Tenant hereby covenants with the Landlord as follows:
                                        <ol type="a">
                                            <li>To pay rent reserved in respect of the said premises on the days and in manner aforesaid.</li>
                                            <li>To pay the security deposit in respect of the said premises as provided in this Agreement.</li>
                                            <li>To pay all charges for utilities supplied to the demised premises such as: electricity, water,
                                                telephone, sewerage bills, garbage and trash disposal or any other utility charges not listed under
                                                the Landlord’s responsibility.</li>
                                            <li>To keep the interior of the demised building and all additions thereto including the windows and
                                                doors and sanitary and water apparatus thereof and the Landlord’s fixtures therein in tenantable
                                                repair except of an injury or deterioration occasioned by ordinary wear and tear.</li>
                                            <li>To make NO alterations, decorations, additions or improvements in or to the demised premises
                                                without the Landlord’s prior written consent, and then only by contractors approved by the
                                                Landlord. All alterations, additions, or improvements upon the premises, made by either party,
                                                shall become the property of the Landlord and shall remain upon, and be surrendered with said
                                                premises, as a part thereof, at the end of the term hereof.</li>
                                            <li>To be responsible for and pay any damages done by rain, wind hail, tornadoes, etc., if this damage
                                                is caused by leaving windows open, allowing stoppage and/or overflow or water and/or sewerage
                                                pipes, broken windows or doors, torn screens, broken door and window locks, etc. or any damage
                                                caused while Tenant has occupancy; and NOT to cut, drill or injure any of the walls or timbers
                                                thereof NOR to permit any of the aforesaid things to be done.</li>
                                            <li>To permit the landlord under her agents with all necessary workmen and appliance at all reasonable
                                                times to enter upon the demised premises for the purpose of executing repairs for which she is
                                                liable under her covenants in that behalf hereinafter contained.</li>
                                            <li>To permit the Landlord and his/her agents with or without workmen and other at reasonable times to
                                                enter upon and examine the condition of the demised premises and thereupon the Landlord may serve
                                                upon the Tenant notice in writing specifying any repairs necessary to be done and require the
                                                Tenant forthwith to execute the same and if the Tenant shall not within fourteen days after the
                                                service of notice proceed diligently with the execution of such repairs then to permit the
                                                Landlord to enter upon the demised premises and execute such repairs and the costs thereof shall
                                                be a debt due to the Landlord by the Tenant and be forthwith recoverable by action.</li>
                                            <li>To permit the Landlord or Landlord’s Mortgage (if any) by his/her appointed officer or agent at
                                                all reasonable times to enter upon the demised premises for the purposes of inspecting the same
                                                and carrying out any works of repair which the Landlord or Mortgagee may be entitled to carry out
                                                under his/her Mortgage or any Deed thereof.</li>
                                            <li>To notify the Landlord immediately if roof leaks, water spots appear on ceiling, or at the first
                                                sign of termite activity or serious building problems such as foundation cracks, a tilting
                                                verandah, a crack in plaster, buckling dry wall or siding, a spongy floor, or a leaky geyser. Not
                                                notifying the Landlord may result in the Tenant being held financially responsible.</li>
                                            <li>NOT to or suffer or permit to be done anything whereby any policy of insurance on the premises
                                                against fire effected by the Landlord may become void or voidable or whereby the rate of premium
                                                thereon may be increased and to pay the Landlord forthwith all sums from time to time paid by
                                                him/her for or in respect of any such increased premium or the renewal of any such policy so
                                                voided becoming voidable.</li>
                                            <li>NOT to assign, underlet or part with the possession of the demised premises or any part thereof
                                                without the previous written consent of the Landlord (such consent not to be unreasonably
                                                withheld) and the Landlord’s Mortgage (if any).</li>
                                            <li>To ensure that waste is properly disposed of in bins and stored neatly until collected by the
                                                solid waste management agents engaged to provide this service.</li>
                                            <li>NOT to keep any pets UNLESS with the consent of the Landlord.</li>
                                            <li>NOT to use demised premise for any purpose other than that of a residential dwelling house.</li>
                                            <li>AT the determination of the term to yield up the demised premises and all fixtures therein
                                                (except such Tenant’s fixtures as shall belong to the Tenant) in such state of repair and
                                                condition as they were at the commencement of the term created and in accordance with the
                                                covenants of the tenant in that behalf hereinbefore contained and with all locks keys and
                                                fastening complete.</li>
                                        </ol>
                                    </li>
                                
                             
                                    <li> THE Landlord hereby covenants with the Tenants as follows:
                                    
                                        <ol class="list-style-type:decimal">
                                            <li>TO keep the exterior of the building of the demised premises and the roof and main walls and the
                                                exterior drains pipes and cable thereof in good state of repair and to do such structure repairs
                                                as may be necessary for the convenient occupation of the tenant.</li>
                                            <li>TO pay all council rates, other taxes (including withholding tax), charges assessments outgoing and
                                                imposition which now are or may hereafter become payable in respect of the demised premised for
                                                which the Tenant is not liable under the covenants on her part herein contained and to keep the
                                                Tenant indemnified against the same.</li>
                                            <li>THAT the Tenant paying the rent hereby reserved and performing and observing the covenants on the
                                                part of the Tenant and the conditions herein contained shall quietly enjoy the demised premise
                                                during the term created without any interruption by the Landlord or any agent rightfully
                                                claiming under or in trust for it.</li>
                                        </ol>
                                    </li>
                                    <li> PROVIDED ALWAYS and it is hereby agreed as follows:
                                    
                                        <ol class="list-style-type:lower-alpha">
                                            <li>If any covenants on the Tenant’s part contained shall not be performed or observed or if the
                                                Tenant shall become bankrupt or enter into composition or arrangement with his/her creditors or
                                                suffer any distress or execution to be levied on his/her goods then, and in any of the said
                                                cases, it shall be lawful for the Landlord at any time thereafter, to enter upon the demised
                                                premises or any part thereof in the name of the whole and thereupon the demise shall absolutely
                                                be determined but without prejudice to any right of action of the Landlord in respect of the
                                                Tenant’s covenants hereinbefore contained and sums due thereof.</li>
                                            <li>Any dispute concerning this Tenancy shall be referred to a single arbitrator in case the parties
                                                can agree upon one and otherwise two arbitrators one to be appointed by each party and in either
                                                case in accordance with the provisions of the Arbitration Act No. 19 of 2000 or any statutory
                                                mediation or re-enactment thereof for the time being in force.</li>
                                            <li>This Lease is for a fixed period of one (1) year and the Parties irrevocably agree that the term
                                                created herein shall be subject to renewal. Either party shall be required to give one (1)
                                                month’s written notice to the other party of his/her intention not to renew this Lease.</li>
                                        </ol>
                                    </li>
                                    <li> IN WITNESS WHEREOF:
                                    
                                        <p>IN WITNESS WHEREOF the parties hereto have executed these presents on the day and year first above
                                            written.</p>
                                        <div class="row mt-4">
                                            <div class="col-md-6 text-center">
                                                <h4>The Landlord</h4>
                                                <p>_________________________<br>
                                                    GIFT KATEBE</p>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <h4>The Tenant</h4>
                                                <p>_________________________<br>
                                                    <?php echo strtoupper($tenant_name)?></p>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary printBtn" onclick="printContent('printDiv');"><i class="bi bi-printer"></i> Print Agreement</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- Agreement Form Modal -->
        <div class="modal fade" id="LeaseModal"  aria-labelledby="LeaseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="LeaseModalLabel">Tenant lease agreement form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="leaseForm">
                            <div class="row mb-3">
                                <label for="landlord_name" class="col-sm-4 col-form-label">Landlord's Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="landlord_name" id="landlord_name" placeholder="Enter landlord's name" value="Gift Katebe" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tenant_name" class="col-sm-4 col-form-label">Tenant's Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tenant_name" id="tenant_name" value="<?php echo $_SESSION['firstname']?> <?php echo $_SESSION['lastname']?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tenant_phone" class="col-sm-4 col-form-label">Tenant's Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tenant_phone" id="tenant_phone" value="<?php echo $_SESSION['phonenumber']?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="flat_number" class="col-sm-4 col-form-label">Flat Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="flat_number" id="flat_number" value="<?php echo getTenantsAdress($_SESSION['phonenumber'])?>"  readonly>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="lease_term" class="col-sm-4 col-form-label">Lease Term</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="lease_term" name="lease_term">
                                        <option selected disabled>Select Lease Term</option>
                                        <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                echo "<option value='$i'>$i month(s)</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rent_amount" class="col-sm-4 col-form-label">Monthly Rent Amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="ZMW">ZMW</option>
                                            <option value="USD">USD</option>
                                        </select>
                                        <input type="text" class="form-control" name="rent_amount" id="rent_amount" placeholder="Enter monthly rent amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="security_deposit" class="col-sm-4 col-form-label">Security Deposit</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="ZMW">ZMW</option>
                                            <option value="UDS">UDS</option>
                                        </select>
                                        <input type="text" class="form-control" name="security_deposit" id="security_deposit" placeholder="Enter security deposit amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="agreement_date" class="col-sm-4 col-form-label">Agreement Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="agreement_date" id="agreement_date" placeholder="Enter Agreement Date" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                    I agree to the terms and conditions.
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>

    <script>
        
    </script>
</body>
</html>
