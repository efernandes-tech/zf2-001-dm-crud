<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	$request = $this->getRequest();
    	
    	$result = array();
    	
    	if ($request->isPost())
    	{
    		try {
	    		$nome = $request->getPost('nome');
	    		$cpf = $request->getPost('cpf');
	    		$salario = $request->getPost('salario');
	    		
	    		// CRUD - Create.
	    		
	    		// Instancia o objeto e alimenta os atributos.
	    		$funcionario = new \Application\Model\Funcionario();
	    		$funcionario->setNome($nome);
	    		$funcionario->setCpf($cpf);
	    		$funcionario->setSalario($salario);
	    		
	    		// Chama o Doctrine.
	    		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

	    		// Doctrine inseri no DB.
	    		$em->persist($funcionario);
	    		
	    		// Realiza o commit.
	    		$em->flush();
	    		
	    		$result['msg'] = $nome . ", enviado corretamente!";
    		} catch (Exception $e) {
    			
    		}
    	}
    	
        return new ViewModel($result);
    }
    
    public function listarAction()
    {
    	// CRUD - Read.
    	
    	// Chama o Doctrine.
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	// SELECT em todos os funcionarios.
    	$lista = $em->getRepository("Application\Model\Funcionario")->findAll();

    	return new ViewModel(array('lista' => $lista));
    }
    
    public function excluirAction()
    {
    	// CRUD - Delete.
    	
    	// Pega o ID ou retorna 0 por padrao.
    	$id = $this->params()->fromRoute('id', 0);
    	
    	// Chama o Doctrine.
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	
    	// Busca e instancia objeto.
    	$funcionario = $em->find('Application\Model\Funcionario', $id);
    	
    	// Remove o funcionario.
    	$em->remove($funcionario);
    	
    	// Realiza o commit.
    	$em->flush();
    	
    	return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'listar'));
    }
    
    public function editarAction()
    {
    	// CRUD - Update.
    	 
    	// Pega o ID ou retorna 0 por padrao.
    	$id = $this->params()->fromRoute('id', 0);
    	 
    	// Chama o Doctrine.
    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    	 
    	// Busca e instancia objeto.
    	$funcionario = $em->find('Application\Model\Funcionario', $id);
    	
    	$request = $this->getRequest();
    	
    	if ($request->isPost())
    	{
    		try {
    			$nome = $request->getPost('nome');
    			$cpf = $request->getPost('cpf');
    			$salario = $request->getPost('salario');
    			
    			$funcionario->setNome($nome);
    			$funcionario->setCpf($cpf);
    			$funcionario->setSalario($salario);
    			
    			// Chama o Doctrine.
    			$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    			
    			// Doctrine atualiza o funcionario no DB.
    			$em->persist($funcionario);
    			 
    			// Realiza o commit.
    			$em->flush();
    		} catch (Exception $e) {
    			
    		}
    		
    		return $this->redirect()->toRoute('application/default', array('controller' => 'index', 'action' => 'listar'));
    	}
    	     	 
    	return new ViewModel(array('f' => $funcionario));
    }
}
