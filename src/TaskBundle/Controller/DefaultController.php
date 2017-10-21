<?php

namespace TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TaskBundle\Form\TaskType;
use TaskBundle\Entity\Task;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $task_list = $em->getRepository("TaskBundle:Task")->findAll();
        return $this->render('TaskBundle:Default:taskList.html.twig',
                array('task_list' => $task_list
        ));
    }
    
    public function taskDeleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("TaskBundle:Task")->findOneById($id);
        if($task != null){
            $em->remove($task);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'The task has been deleted.');
        } else {
             $request->getSession()->getFlashBag()->add('error', 'The task could not been found.');
        }
         
        return $this->redirectToRoute('task_list');
    }
    
    public function taskDeleteFirstAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("TaskBundle:Task")->findOneBy(array(), array('id' => 'ASC'));
         
        if($task != null){
            $em->remove($task);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'The task has been deleted.');
        } else {
            $request->getSession()->getFlashBag()->add('error', 'The task could not been found.');
        }
        return $this->redirectToRoute('task_list');
    }
    
    public function taskUpdateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository("TaskBundle:Task")->findOneById($id);
       
        if($task != null){
            // Set it to the oposite of what it is now.
            $task->setCompleted(!$task->getCompleted());
            $em->persist($task);
            $em->flush();  
            $request->getSession()->getFlashBag()->add('notice', 'The task has been updated.');
        } else {
            $request->getSession()->getFlashBag()->add('error', 'The task could not been found.');
        }
        return $this->redirectToRoute('task_list');
    }
    
    public function taskCreateAction(Request $request)
    {
        
        $task = new Task();       
        $form = $this->createForm(TaskType::class, $task);

            if ($request->isMethod('POST')) {

                // Task value set to the form.
                $form->handleRequest($request);
                
                // A task is set to false by default.
                $task->setCompleted(false);
                
               
                if ($form->isSubmitted() && $form->isValid()) {
                    // Save it in base.
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($task);
                    $em->flush();        
                    $request->getSession()->getFlashBag()->add('notice', 'The task has been created.');
                } else {
                    $request->getSession()->getFlashBag()->add('error', 'The task could not be created.');
                }
                return $this->redirectToRoute('task_list');
            }

            // Display the form.
            return $this->render('TaskBundle:Default:taskCreate.html.twig', array(
                        'form' => $form->createView()));
    }
}
