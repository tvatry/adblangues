<?php

namespace App\Entity;


/**
 * Class Step
 * @package App\Entity
 */
class Step
{
    //step 1
    /**
     * @var string|null
     */
    private $langage;
    /**
     * @var
     */
    private $visio_prio;
    /**
     * @var
     */
    private $reunion_trav;
    /**
     * @var
     */
    private $reunion_trav_prio;
    /**
     * @var
     */
    private $cond_reunion_trav;
    /**
     * @var
     */
    private $cond_reunion_trav_prio;
    /**
     * @var
     */
    private $reunion_trav_client;
    /**
     * @var
     */
    private $reunion_trav_client_prio;
    /**
     * @var
     */
    private $presentation;
    /**
     * @var
     */
    private $presentation_prio;
    /**
     * @var
     */
    private $negoc;
    /**
     * @var
     */
    private $negoc_prio;
    /**
     * @var
     */
    private $train_action;
    /**
     * @var
     */
    private $train_action_prio;
    /**
     * @var
     */
    private $depl_pro;
    /**
     * @var
     */
    private $depl_pro_prio;
    /**
     * @var
     */
    private $cont_soc;
    /**
     * @var
     */
    private $cont_soc_prio;
    /**
     * @var
     */
    private $exp_oral_autre;
    /**
     * @var
     */
    private $exp_oral_autre_prec;
    /**
     * @var
     */
    private $exp_oral_autre_prec_prio;
    /**
     * @var string|null
     */
    private $first_name;
    /**
     * @var string|null
     */
    private $last_name;

    // step 2
    /**
     * @var
     */
    private $job_demand;
    /**
     * @var
     */
    private $compagny;
    /**
     * @var
     */
    private $phone;
    /**
     * @var
     */
    private $mail;
    /**
     * @var
     */
    private $service;
    /**
     * @var array
     */
    private $place;
    /**
     * @var
     */
    private $cpf;
    /**
     * @var
     */
    private $function;
    /**
     * @var
     */
    private $context;
    /**
     * @var
     */
    private $matern;
    /**
     * @var
     */
    private $matern_precise;
    /**
     * @var
     */
    private $visitors;
    /**
     * @var
     */
    private $visitors_prio;
    /**
     * @var
     */
    private $reseign_tel;
    /**
     * @var
     */
    private $reseign_tel_prio;
    /**
     * @var
     */
    private $conv_tel;
    /**
     * @var
     */
    private $conv_tel_prio;
    /**
     * @var string|null
     */
    private $visio;
    /**
     * @var
     */
    private $comp_ecr_mail;
    /**
     * @var
     */
    private $comp_ecr_mail_prio;
    /**
     * @var
     */
    private $courriers;
    /**
     * @var
     */
    private $courriers_prio;
    /**
     * @var
     */
    private $comptes_rendus;
    /**
     * @var
     */
    private $comptes_rendus_prio;
    /**
     * @var
     */
    private $comptes_rendus_ext;
    /**
     * @var
     */
    private $comptes_rendus_ext_prio;
    /**
     * @var
     */
    private $doc_spe;
    /**
     * @var
     */
    private $doc_spe_prio;
    /**
     * @var
     */
    private $exp_ecr_autre;
    /**
     * @var
     */
    private $exp_ecr_autre_prec;
    /**
     * @var
     */
    private $exp_ecr_autre_prec_prio;
    /**
     * @var
     */
    private $domain;
    /**
     * @var
     */
    private $domain_prec;

    /**
     * @return mixed
     */
    public function getDomainPrec()
    {
        return $this->domain_prec;
    }

    /**
     * @param mixed $domain_prec
     */
    public function setDomainPrec( $domain_prec ): void
    {
        $this->domain_prec = $domain_prec;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param mixed $domain
     */
    public function setDomain( $domain ): void
    {
        $this->domain = $domain;
    }

    /**
     * @return mixed
     */
    public function getCompEcrMail()
    {
        return $this->comp_ecr_mail;
    }

    /**
     * @param mixed $comp_ecr_mail
     */
    public function setCompEcrMail( $comp_ecr_mail ): void
    {
        $this->comp_ecr_mail = $comp_ecr_mail;
    }

    /**
     * @return mixed
     */
    public function getCompEcrMailPrio()
    {
        return $this->comp_ecr_mail_prio;
    }

    /**
     * @param mixed $comp_ecr_mail_prio
     */
    public function setCompEcrMailPrio( $comp_ecr_mail_prio ): void
    {
        $this->comp_ecr_mail_prio = $comp_ecr_mail_prio;
    }

    /**
     * @return mixed
     */
    public function getCourriers()
    {
        return $this->courriers;
    }

    /**
     * @param mixed $courriers
     */
    public function setCourriers( $courriers ): void
    {
        $this->courriers = $courriers;
    }

    /**
     * @return mixed
     */
    public function getCourriersPrio()
    {
        return $this->courriers_prio;
    }

    /**
     * @param mixed $courriers_prio
     */
    public function setCourriersPrio( $courriers_prio ): void
    {
        $this->courriers_prio = $courriers_prio;
    }

    /**
     * @return mixed
     */
    public function getComptesRendus()
    {
        return $this->comptes_rendus;
    }

    /**
     * @param mixed $comptes_rendus
     */
    public function setComptesRendus( $comptes_rendus ): void
    {
        $this->comptes_rendus = $comptes_rendus;
    }

    /**
     * @return mixed
     */
    public function getComptesRendusPrio()
    {
        return $this->comptes_rendus_prio;
    }

    /**
     * @param mixed $comptes_rendus_prio
     */
    public function setComptesRendusPrio( $comptes_rendus_prio ): void
    {
        $this->comptes_rendus_prio = $comptes_rendus_prio;
    }

    /**
     * @return mixed
     */
    public function getComptesRendusExt()
    {
        return $this->comptes_rendus_ext;
    }

    /**
     * @param mixed $comptes_rendus_ext
     */
    public function setComptesRendusExt( $comptes_rendus_ext ): void
    {
        $this->comptes_rendus_ext = $comptes_rendus_ext;
    }

    /**
     * @return mixed
     */
    public function getComptesRendusExtPrio()
    {
        return $this->comptes_rendus_ext_prio;
    }

    /**
     * @param mixed $comptes_rendus_ext_prio
     */
    public function setComptesRendusExtPrio( $comptes_rendus_ext_prio ): void
    {
        $this->comptes_rendus_ext_prio = $comptes_rendus_ext_prio;
    }

    /**
     * @return mixed
     */
    public function getDocSpe()
    {
        return $this->doc_spe;
    }

    /**
     * @param mixed $doc_spe
     */
    public function setDocSpe( $doc_spe ): void
    {
        $this->doc_spe = $doc_spe;
    }

    /**
     * @return mixed
     */
    public function getDocSpePrio()
    {
        return $this->doc_spe_prio;
    }

    /**
     * @param mixed $doc_spe_prio
     */
    public function setDocSpePrio( $doc_spe_prio ): void
    {
        $this->doc_spe_prio = $doc_spe_prio;
    }

    /**
     * @return mixed
     */
    public function getExpEcrAutre()
    {
        return $this->exp_ecr_autre;
    }

    /**
     * @param mixed $exp_ecr_autre
     */
    public function setExpEcrAutre( $exp_ecr_autre ): void
    {
        $this->exp_ecr_autre = $exp_ecr_autre;
    }

    /**
     * @return mixed
     */
    public function getExpEcrAutrePrec()
    {
        return $this->exp_ecr_autre_prec;
    }

    /**
     * @param mixed $exp_ecr_autre_prec
     */
    public function setExpEcrAutrePrec( $exp_ecr_autre_prec ): void
    {
        $this->exp_ecr_autre_prec = $exp_ecr_autre_prec;
    }

    /**
     * @return mixed
     */
    public function getExpEcrAutrePrecPrio()
    {
        return $this->exp_ecr_autre_prec_prio;
    }

    /**
     * @param mixed $exp_ecr_autre_prec_prio
     */
    public function setExpEcrAutrePrecPrio( $exp_ecr_autre_prec_prio ): void
    {
        $this->exp_ecr_autre_prec_prio = $exp_ecr_autre_prec_prio;
    }

    /**
     * @return string|null
     */
    public function getLangage()
    {
        return $this->langage;
    }

    /**
     * @param string|null $langage
     * @return string|null
     */
    public function setLangage( ?string $langage )
    {
        $this->langage = $langage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string|null $first_name
     * @return string|null
     */
    public function setFirstName( ?string $first_name )
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     * @return string|null
     */
    public function setLastName( ?string $last_name )
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getJobDemand()
    {
        return $this->job_demand;
    }

    /**
     * @param string|null $job_demand
     * @return string|null
     */
    public function setJobDemand( ?string $job_demand )
    {
        $this->job_demand = $job_demand;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompagny()
    {
        return $this->compagny;
    }

    /**
     * @param string|null $compagny
     * @return string|null
     */
    public function setCompagny( ?string $compagny )
    {
        $this->compagny = $compagny;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return string|null
     */
    public function setPhone( ?string $phone )
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string|null $mail
     * @return string|null
     */
    public function setMail( ?string $mail )
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string|null $service
     * @return string|null
     */
    public function setService( ?string $service )
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param array|null $place
     * @return array|null
     */
    public function setPlace( ?array $place )
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     * @return string|null
     */
    public function setCpf( ?string $cpf )
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFunction()
    {
        return $this->function;
    }

    // Step 3-1

    /**
     * @param string|null $function
     * @return string|null
     */
    public function setFunction( ?string $function )
    {
        $this->function = $function;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string|null $context
     * @return string|null
     */
    public function setContext( ?string $context )
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatern()
    {
        return $this->matern;
    }

    /**
     * @param string|null $matern
     * @return string|null
     */
    public function setMatern( ?string $matern )
    {
        $this->matern = $matern;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMaternPrecise()
    {
        return $this->matern_precise;
    }

    /**
     * @param string|null $matern_precise
     * @return string|null
     */
    public function setMaternPrecise( ?string $matern_precise )
    {
        $this->matern_precise = $matern_precise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisitors()
    {
        return $this->visitors;
    }

    /**
     * @param mixed $visitors
     */
    public function setVisitors( $visitors ): void
    {
        $this->visitors = $visitors;
    }

    /**
     * @return mixed
     */
    public function getVisitorsPrio()
    {
        return $this->visitors_prio;
    }

    /**
     * @param mixed $visitors_prio
     */
    public function setVisitorsPrio( $visitors_prio ): void
    {
        $this->visitors_prio = $visitors_prio;
    }

    /**
     * @return mixed
     */
    public function getReseignTel()
    {
        return $this->reseign_tel;
    }

    /**
     * @param mixed $reseign_tel
     */
    public function setReseignTel( $reseign_tel ): void
    {
        $this->reseign_tel = $reseign_tel;
    }

    /**
     * @return mixed
     */
    public function getReseignTelPrio()
    {
        return $this->reseign_tel_prio;
    }

    /**
     * @param mixed $reseign_tel_prio
     */
    public function setReseignTelPrio( $reseign_tel_prio ): void
    {
        $this->reseign_tel_prio = $reseign_tel_prio;
    }

    /**
     * @return mixed
     */
    public function getConvTel()
    {
        return $this->conv_tel;
    }

    /**
     * @param mixed $conv_tel
     */
    public function setConvTel( $conv_tel ): void
    {
        $this->conv_tel = $conv_tel;
    }

    /**
     * @return mixed
     */
    public function getConvTelPrio()
    {
        return $this->conv_tel_prio;
    }

    /**
     * @param mixed $conv_tel_prio
     */
    public function setConvTelPrio( $conv_tel_prio ): void
    {
        $this->conv_tel_prio = $conv_tel_prio;
    }

    /**
     * @return string|null
     */
    public function getVisio(): ?string
    {
        return $this->visio;
    }

    /**
     * @param string|null $visio
     */
    public function setVisio( ?string $visio ): void
    {
        $this->visio = $visio;
    }

    /**
     * @return bool|null
     */
    public function getVisioPrio(): ?bool
    {
        return $this->visio_prio;
    }

    /**
     * @param bool|null $visio_prio
     */
    public function setVisioPrio( ?bool $visio_prio ): void
    {
        $this->visio_prio = $visio_prio;
    }

    /**
     * @return mixed
     */
    public function getReunionTrav()
    {
        return $this->reunion_trav;
    }

    /**
     * @param mixed $reunion_trav
     */
    public function setReunionTrav( $reunion_trav ): void
    {
        $this->reunion_trav = $reunion_trav;
    }

    /**
     * @return mixed
     */
    public function getReunionTravPrio()
    {
        return $this->reunion_trav_prio;
    }

    /**
     * @param mixed $reunion_trav_prio
     */
    public function setReunionTravPrio( $reunion_trav_prio ): void
    {
        $this->reunion_trav_prio = $reunion_trav_prio;
    }

    /**
     * @return mixed
     */
    public function getCondReunionTrav()
    {
        return $this->cond_reunion_trav;
    }

    /**
     * @param mixed $cond_reunion_trav
     */
    public function setCondReunionTrav( $cond_reunion_trav ): void
    {
        $this->cond_reunion_trav = $cond_reunion_trav;
    }

    /**
     * @return mixed
     */
    public function getCondReunionTravPrio()
    {
        return $this->cond_reunion_trav_prio;
    }

    /**
     * @param mixed $cond_reunion_trav_prio
     */
    public function setCondReunionTravPrio( $cond_reunion_trav_prio ): void
    {
        $this->cond_reunion_trav_prio = $cond_reunion_trav_prio;
    }

    /**
     * @return mixed
     */
    public function getReunionTravClient()
    {
        return $this->reunion_trav_client;
    }

    /**
     * @param mixed $reunion_trav_client
     */
    public function setReunionTravClient( $reunion_trav_client ): void
    {
        $this->reunion_trav_client = $reunion_trav_client;
    }

    /**
     * @return mixed
     */
    public function getReunionTravClientPrio()
    {
        return $this->reunion_trav_client_prio;
    }

    /**
     * @param mixed $reunion_trav_client_prio
     */
    public function setReunionTravClientPrio( $reunion_trav_client_prio ): void
    {
        $this->reunion_trav_client_prio = $reunion_trav_client_prio;
    }

    /**
     * @return mixed
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param mixed $presentation
     */
    public function setPresentation( $presentation ): void
    {
        $this->presentation = $presentation;
    }

    /**
     * @return mixed
     */
    public function getPresentationPrio()
    {
        return $this->presentation_prio;
    }

    /**
     * @param mixed $presentation_prio
     */
    public function setPresentationPrio( $presentation_prio ): void
    {
        $this->presentation_prio = $presentation_prio;
    }

    /**
     * @return mixed
     */
    public function getNegoc()
    {
        return $this->negoc;
    }

    /**
     * @param mixed $negoc
     */
    public function setNegoc( $negoc ): void
    {
        $this->negoc = $negoc;
    }

    /**
     * @return mixed
     */
    public function getNegocPrio()
    {
        return $this->negoc_prio;
    }

    /**
     * @param mixed $negoc_prio
     */
    public function setNegocPrio( $negoc_prio ): void
    {
        $this->negoc_prio = $negoc_prio;
    }

    /**
     * @return mixed
     */
    public function getTrainAction()
    {
        return $this->train_action;
    }

    /**
     * @param mixed $train_action
     */
    public function setTrainAction( $train_action ): void
    {
        $this->train_action = $train_action;
    }

    /**
     * @return mixed
     */
    public function getTrainActionPrio()
    {
        return $this->train_action_prio;
    }

    /**
     * @param mixed $train_action_prio
     */
    public function setTrainActionPrio( $train_action_prio ): void
    {
        $this->train_action_prio = $train_action_prio;
    }

    /**
     * @return mixed
     */
    public function getDeplPro()
    {
        return $this->depl_pro;
    }

    /**
     * @param mixed $depl_pro
     */
    public function setDeplPro( $depl_pro ): void
    {
        $this->depl_pro = $depl_pro;
    }

    /**
     * @return mixed
     */
    public function getDeplProPrio()
    {
        return $this->depl_pro_prio;
    }

    /**
     * @param mixed $depl_pro_prio
     */
    public function setDeplProPrio( $depl_pro_prio ): void
    {
        $this->depl_pro_prio = $depl_pro_prio;
    }

    /**
     * @return mixed
     */
    public function getContSoc()
    {
        return $this->cont_soc;
    }

    /**
     * @param mixed $cont_soc
     */
    public function setContSoc( $cont_soc ): void
    {
        $this->cont_soc = $cont_soc;
    }

    /**
     * @return mixed
     */
    public function getContSocPrio()
    {
        return $this->cont_soc_prio;
    }

    /**
     * @param mixed $cont_soc_prio
     */
    public function setContSocPrio( $cont_soc_prio ): void
    {
        $this->cont_soc_prio = $cont_soc_prio;
    }

    /**
     * @return mixed
     */
    public function getExpOralAutre()
    {
        return $this->exp_oral_autre;
    }

    /**
     * @param mixed $exp_oral_autre
     */
    public function setExpOralAutre( $exp_oral_autre ): void
    {
        $this->exp_oral_autre = $exp_oral_autre;
    }

    /**
     * @return mixed
     */
    public function getExpOralAutrePrec()
    {
        return $this->exp_oral_autre_prec;
    }

    /**
     * @param mixed $exp_oral_autre_prec
     */
    public function setExpOralAutrePrec( $exp_oral_autre_prec ): void
    {
        $this->exp_oral_autre_prec = $exp_oral_autre_prec;
    }

    /**
     * @return mixed
     */
    public function getExpOralAutrePrecPrio()
    {
        return $this->exp_oral_autre_prec_prio;
    }

    /**
     * @param mixed $exp_oral_autre_prec_prio
     */
    public function setExpOralAutrePrecPrio( $exp_oral_autre_prec_prio ): void
    {
        $this->exp_oral_autre_prec_prio = $exp_oral_autre_prec_prio;
    }


}
