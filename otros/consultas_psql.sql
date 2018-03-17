SELECT titulo
 FROM fichas
 WHERE to_tsquery('muy & interesante') @@ to_tsvector(coalesce(titulo,'') || ' ' ||
                                                   coalesce(autor,''))
 ORDER BY id DESC
 LIMIT 10;

-------------------

SELECT COUNT(*) AS total FROM (SELECT id, titulo, autor
                               FROM fichas
                               WHERE to_tsvector(titulo || autor) @@  plainto_tsquery('english',titulo || autor)
                               order by id) AS sub

-----------------------

SELECT id, titulo, autor
FROM fichas
WHERE to_tsvector(titulo || autor) @@ plainto_tsquery('spanish', 'muy interesante');

----------------------------------------

SELECT id, titulo, autor
FROM fichas
WHERE to_tsquery('spanish', 'TELEVISA & interesante') @@ to_tsvector(coalesce(titulo,'') || ' ' ||
                                                                     coalesce(autor,''))
ORDER BY id DESC;

------------OJO----------------------------------

SELECT id, titulo, autor, isbn
FROM fichas
WHERE to_tsvector(coalesce(titulo,'') || ' ' || coalesce(autor,'') || ' ' || coalesce(isbn,''))
      @@
      to_tsquery('ALGEBRA & TRIGONOMETRIA');
