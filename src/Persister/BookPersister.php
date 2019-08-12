<?php


namespace App\Persister;


use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookPersister implements DataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function supports($data): bool
    {
        return $data instanceOf Book;
    }

    public function persist($data)
    {
        /** @var Book $data */
        if (!$data->getId()) {
            $data->setRegisteredAt(new \DateTimeImmutable());
            $this->em->persist($data);
        }

        $this->em->flush();
        $this->em->refresh($data);
    }

    public function remove($data)
    {
        $this->em->remove($data);
        $this->em->flush();
    }

}
