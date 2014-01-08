# Exception-Safe Executions

This is a demonstration of how we can guarantee execution of code before
thrown exceptions are propagated. To do this, we need a way to tie the code
to the lifespan of the executed process.

This idea is from the concept of [Resource Acquisition Is Initialisation][raii]
(RAII), developed by Bjarne Stroustrup. This implementation uses the first example
demoed in a [video][video] by [Bo Qian][bo].

[raii]: http://en.wikipedia.org/wiki/Resource_Acquisition_Is_Initialization
[video]: http://www.youtube.com/watch?v=ojOUIg13g3I
[bo]: http://www.youtube.com/user/BoQianTheProgrammer
