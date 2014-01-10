#lang scheme
;NUIM/CS424 F2013, 
;Sinead Kearney
;Assignment 1
;part b



;;; Today we write a meta-circular interpreter

(define my-map
  (lambda (f xs)
    (if (null? xs)
	xs
	(cons (f (car xs))
	      (map f (cdr xs))))))

;;; Built-in map is like my-map but handles more than one list arg.

(define global-vars
  (list (list 'car car)
	(list '+ (lambda (x y) (+ x y 0.00001)))
	(list '* *)
	(list 'cons cons)
	(list 'pi (* 2 (atan 1 0)))
	(list '= =)
        (list 'var1 5)
        (list 'var2 4)
        (list '< <)
        (list '> >)))

(define lookup
  (lambda (s key-value-list)
    (if (equal? s (caar key-value-list)) 
        (cadr (car key-value-list))      
	(lookup s (cdr key-value-list)))))



(define my-let
  (lambda (expr)
    (cons (list 'lambda  (map car (cadr expr))(caddr expr)) 
          (map cadr (cadr expr)))
    ))
;(let ((x 5)(y 4)) (* (+ x y) x)) -> ((lambda (x y) (* (+ x y) x)) 5 4)



(define my-cond
  (lambda (expr)
    (cond ((and (not (eq? expr '())) (> (length expr) 1) (not (eq? (caadr expr) 'else)))          
           (let ((condit (map car (cdr expr)))
                 (posRes (map cadr (cdr expr))))
             (cons 'if (list (car condit) (car posRes) (my-cond (append (list 'cond) (cddr expr)))))              
             ))
          ((and (not (eq? expr '())) (> (length expr) 1) (eq? (caadr expr) 'else)) ;else
           (cadr (cadr expr)))
          
          (else (list 'values)));cond did not specify an "else", use "else do nothing" in generated if-statement
    ))
;(cond ((< var1 var2) var2) ((> var1 var2) var1)) -> (if (< var1 var2) var2 (if (> var1 var2) var1 (values)))
;(cond ((< var1 var2) var2) (else (* var2 var1))) -> (if (< var1 var2) var2 (* var2 var1))


(define my-eval
  (lambda (expr env)			; EXPR to evaluate, in context of ENV which maps vars->values
    (cond ((number? expr) expr)		; NUMBER, if it's a number, just return the number
	  ((symbol? expr)		; VARIABLE
	   (lookup expr (append env global-vars)))
	  ((and (pair? expr) (equal? (car expr) 'lambda)) ; (LAMBDA (var...) body)
	   (list 'closure (cadr expr) (caddr expr) env))
	  ((and (pair? expr) (equal? (car expr) 'quote)) ; (QUOTE something)
	   (cadr expr))
	  ((and (pair? expr) (equal? (car expr) 'if)) ; (IF test then else)
	   (my-eval
	    ((if (my-eval (cadr expr) env)
		 caddr
		 cadddr)
	     expr)
	    env))
                   
          ((equal? (car expr) 'let) ;let
              (my-eval (my-let expr) env))
                   
          ((equal? (car expr) 'cond) ;cond
              (my-eval (my-cond expr) env))
          
	  ;; Special forms go above here.
	  ((pair? expr)			; (f arg ...)
	   (my-apply
	    (my-eval (car expr) env)
	    (map (lambda (expr) (my-eval expr env)) (cdr expr))))
	  )))

(define my-apply
  (lambda (f args)
    (cond ((and (pair? f) (equal? (car f) 'closure)) ; (closure vars body env)
	   (let ((vars (cadr f)) (body (caddr f)) (env (cadddr f)))
	     (my-eval body (append (map list vars args) env))))
	  (else (apply f args)))))

