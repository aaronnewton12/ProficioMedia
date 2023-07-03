<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BusinessValuationRepository")
 */
class BusinessValuation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $business_sector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reason_for_valuation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tenure;

    /**
     * @ORM\Column(type="integer")
     */
    private $annual_turnover;

    /**
     * @ORM\Column(type="integer")
     */
    private $net_profit;

    /**
     * @ORM\Column(type="integer")
     */
    private $assets_value;

    /**
     * @ORM\Column(type="integer")
     */
    private $property_freehold_value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $business_postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $metric_data_serialised;

    /**
     * @ORM\Column(type="integer")
     */
    private $estimated_value_lower;

    /**
     * @ORM\Column(type="integer")
     */
    private $estimated_value_upper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estimated_value_met_expectations;

    /**
     * @Assert\Type("\DateTimeInterface")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getEmailAddress(): ?string
    {
        return $this->email_address;
    }

    public function setEmailAddress(string $email_address): self
    {
        $this->email_address = $email_address;

        return $this;
    }

    public function getBusinessSector(): ?string
    {
        return $this->business_sector;
    }

    public function setBusinessSector(string $business_sector): self
    {
        $this->business_sector = $business_sector;

        return $this;
    }

    public function getReasonForValuation(): ?string
    {
        return $this->reason_for_valuation;
    }

    public function setReasonForValuation(string $reason_for_valuation): self
    {
        $this->reason_for_valuation = $reason_for_valuation;

        return $this;
    }

    public function getTenure(): ?string
    {
        return $this->tenure;
    }

    public function setTenure(string $tenure): self
    {
        $this->tenure = $tenure;

        return $this;
    }

    public function getAnnualTurnover(): ?int
    {
        return $this->annual_turnover;
    }

    public function setAnnualTurnover(int $annual_turnover): self
    {
        $this->annual_turnover = $annual_turnover;

        return $this;
    }

    public function getNetProfit(): ?int
    {
        return $this->net_profit;
    }

    public function setNetProfit(int $net_profit): self
    {
        $this->net_profit = $net_profit;

        return $this;
    }

    public function getAssetsValue(): ?int
    {
        return $this->assets_value;
    }

    public function setAssetsValue(int $assets_value): self
    {
        $this->assets_value = $assets_value;

        return $this;
    }

    public function getPropertyFreeholdValue(): ?int
    {
        return $this->property_freehold_value;
    }

    public function setPropertyFreeholdValue(int $property_freehold_value): self
    {
        $this->property_freehold_value = $property_freehold_value;

        return $this;
    }

    public function getBusinessPostcode(): ?string
    {
        return $this->business_postcode;
    }

    public function setBusinessPostcode(string $business_postcode): self
    {
        $this->business_postcode = $business_postcode;

        return $this;
    }

    public function getMetricDataSerialised(): ?string
    {
        return $this->metric_data_serialised;
    }

    public function setMetricDataSerialised(string $metric_data_serialised): self
    {
        $this->metric_data_serialised = $metric_data_serialised;

        return $this;
    }

    public function getEstimatedValueLower(): ?int
    {
        return $this->estimated_value_lower;
    }

    public function setEstimatedValueLower(int $estimated_value_lower): self
    {
        $this->estimated_value_lower = $estimated_value_lower;

        return $this;
    }

    public function getEstimatedValueUpper(): ?int
    {
        return $this->estimated_value_upper;
    }

    public function setEstimatedValueUpper(int $estimated_value_upper): self
    {
        $this->estimated_value_upper = $estimated_value_upper;

        return $this;
    }

    public function getEstimatedValueMetExpectations(): ?string
    {
        return $this->estimated_value_met_expectations;
    }

    public function setEstimatedValueMetExpectations(string $estimated_value_met_expectations): self
    {
        $this->estimated_value_met_expectations = $estimated_value_met_expectations;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSignature()
    {
        // Create a 5 character signature based on the ID and the created data, which
        // we know have already been peristed and will never change. We use this to
        // validate users returning the BasicBusinessValuation from an email link.
        if ($this->getId())
        {
            $signatureFull = md5($this->getId() . $this->getCreatedAt()->format('Y-m-d H:i:s'));
        }
        else
        {
            $signatureFull = md5('');
        }
        return substr($signatureFull, 0, 5);
    }

}